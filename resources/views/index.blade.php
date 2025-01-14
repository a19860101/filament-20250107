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
    <section>
        <div class="container mx-auto flex flex-wrap">
            @foreach ($products_feature as $p)
            <div class="w-1/4 p-3">
                <div class="border">
                    <div>
                        <img src="/storage/{{$p->cover}}" alt="">
                    </div>
                    <div>
                        <h4>{{$p->title}}</h4>
                        <div>{{$p->price}}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</body>
</html>
