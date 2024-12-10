@foreach ($promotions as $item)
    <x-news_card :slug="'/promotions/' . $item['slug']" :title="$item['title']" :description="$item['description']" :created_at="$item['created_at']" />
@endforeach
