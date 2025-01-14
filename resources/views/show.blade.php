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

</body>
</html>
