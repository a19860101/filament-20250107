<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    <nav class="w-full flex justify-between px-3 py-5 bg-zinc-900 text-zinc-100">
        <a href="#">Logo</a>
        <div class="space-x-3">
            <a href="/">所有商品</a>
            @foreach ($categories as $category )
            <a href="#">{{$category->title}}</a>
            @endforeach
        </div>
    </nav>
    <section class="py-24">
        <div class="container mx-auto flex flex-wrap">
            <div class="w-1/2 p-4">
                <div class="aspect-square">
                    <img src="/storage/{{$product->cover}}" alt="{{$product->title}}" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="w-1/2 flex flex-col p-4">
                <h3 class="text-3xl font-bold mb-3">{{$product->title}}</h3>
                <div>
                    {!! $product->description !!}
                </div>
                <div class="mt-auto">
                    @if($product->sale == null)
                    <div><b class="text-3xl">${{$product->price}}</b></div>

                    @else
                    <div><b class="text-3xl">${{$product->sale}}</b></div>
                    <div><del class="text-sm text-zinc-400">${{$product->price}}</del></div>
                    @endif
                </div>
            </div>
            <div class="w-full">

            </div>
        </div>
    </section>

</body>
</html>
