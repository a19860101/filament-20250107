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
            <a href="#">link</a>
            <a href="#">link</a>
            <a href="#">link</a>
            <a href="#">link</a>
            <a href="#">link</a>
        </div>
    </nav>
    <section class="bg-teal-50 py-24">
        <div class="container mx-auto flex flex-wrap">
            <h2 class="w-full text-center text-3xl font-bold mb-4">熱賣商品</h2>
            @foreach ($products_feature as $p)
            <div class="w-1/4 p-3">
                <a href="#" class="flex flex-col border border-zinc-400 rounded overflow-hidden">
                    <div class="aspect-square">
                        <img src="/storage/{{$p->cover}}" alt="" class="w-full h-full object-cover">
                    </div>
                    <div class="p-3 flex flex-col h-full bg-white">
                        <h4>{{$p->title}}</h4>
                        <div class="mt-auto">
                            @if($p->sale == null)
                            <b>${{$p->price}}</b>
                            @else
                            <b>${{$p->sale}}</b>
                            <del class="text-sm text-zinc-400">${{$p->price}}</del>
                            @endif
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>
    <section class="py-24">
        <div class="container mx-auto flex flex-wrap">
            <h2 class="w-full text-center text-3xl font-bold mb-4">特價商品</h2>
            @foreach ($products_sale as $p)
            <div class="w-1/4 p-3">
                <a href="#" class="flex flex-col border border-zinc-400 rounded overflow-hidden">
                    <div class="aspect-square">
                        <img src="/storage/{{$p->cover}}" alt="" class="w-full h-full object-cover">
                    </div>
                    <div class="p-3 flex flex-col h-full bg-white">
                        <h4>{{$p->title}}</h4>
                        <div class="mt-auto">
                            @if($p->sale == null)
                            <b>${{$p->price}}</b>
                            @else
                            <b>${{$p->sale}}</b>
                            <del class="text-sm text-zinc-400">${{$p->price}}</del>
                            @endif
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>
</body>
</html>
