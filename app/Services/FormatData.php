<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FormatData
{
    public function cutArraysFromRequest($data, $array_keys)
    {
        foreach ($array_keys as $key) :
            $arreyIds[$key] = $data[$key] ?? null;
            unset($data[$key]);
        endforeach;
        return [
            'data' => $data,
            'arreyIds' => $arreyIds
        ];
    }
    public function changeTitleToId($data, $model, $key)
    {
        if (isset($data[$key])) :
            $data[$key] = $model::where('title', $data[$key])->first()->id;
        endif;
        return $data;
    }
    public function writeDataToTable($item, $arreyIds)
    {
        foreach ($arreyIds as $keyIds => $entityIds) :
            if (isset($entityIds)) :
                foreach ($entityIds as $key => $value) :
                    $entity_id = DB::table($keyIds)
                        ->where('title', $value)
                        ->first()->id;
                    $entityIds[$key] = $entity_id;
                endforeach;
                if ($keyIds == 'specializations') :
                    $item->specializations()->sync($entityIds);
                endif;
                if ($keyIds == 'services') :
                    $item->services()->sync($entityIds);
                endif;
            else :
                if ($keyIds == 'specializations') :
                    $item->specializations()->sync($entityIds);
                endif;
                if ($keyIds == 'services') :
                    $item->services()->sync($entityIds);
                endif;
            endif;
        endforeach;
    }

    function getReadingTime($description)
    {
        $reading_time = (int) ceil(
            (Str::wordCount($description) / 265) * 60
        );
        if ($reading_time < 60) :
            $reading_time = $reading_time . $this->getNumEnding($reading_time, array(' секунда', ' секунды', ' секунд'));
        else :
            $reading_time = floor($reading_time / 60) . $this->getNumEnding($reading_time, array(' минута', ' минуты', ' минут'));
        endif;

        return $reading_time;
    }

    function getNumEnding($number, $endingArray)
    {
        $number = $number % 100;
        if ($number >= 11 && $number <= 19) {
            $ending = $endingArray[2];
        } else {
            $i = $number % 10;
            switch ($i) {
                case (1):
                    $ending = $endingArray[0];
                    break;
                case (2):
                case (3):
                case (4):
                    $ending = $endingArray[1];
                    break;
                default:
                    $ending = $endingArray[2];
            }
        }
        return $ending;
    }
}
