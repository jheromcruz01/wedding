<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Guest Gallery</title>
<style>
    body{
        font-family: "Tinos", serif;
        background: linear-gradient(135deg,#f7f7f7,#ececec);
        padding:40px;
        color:#222;
    }
    .top {
        max-width:900px;
        margin:0 auto 30px;
        text-align:center;
    }
    .upload-card{
        background:#fff;
        padding:18px;
        border-radius:8px;
        box-shadow:0 8px 30px rgba(0,0,0,.06);
        display:flex;
        gap:12px;
        align-items:center;
        justify-content:center;
        margin-bottom:22px;
    }
    .upload-card input[type=file]{display:inline-block;}
    .btn{
        background:#333;color:#fff;padding:10px 14px;border-radius:6px;border:0;cursor:pointer;
    }

    /* Polaroid grid */
    .grid{
        display:grid;
        grid-template-columns:repeat(auto-fill,minmax(160px,1fr));
        gap:22px;
        max-width:1100px;
        margin:0 auto;
    }

    .polaroid{
        background:#fff;
        padding:12px 12px 22px;
        border-radius:6px;
        box-shadow:0 10px 30px rgba(0,0,0,.12);
        transform:rotate(calc(-2deg + (random(5) * 1deg)));
        transition:transform .18s ease;
        text-align:center;
    }
    .polaroid img{
        width:100%;
        height:140px;
        object-fit:cover;
        border-radius:3px;
        display:block;
        margin-bottom:8px;
    }
    .polaroid:hover{ transform:translateY(-6px) rotate(-1deg); box-shadow:0 18px 40px rgba(0,0,0,.15); }
    .caption{ font-size:13px;color:#666; }

    /* simple responsive */
    @media (max-width:520px){
        .polaroid img{ height:110px; }
    }
</style>
</head>
<body>
    <div class="top">
        <h1 style="font-family: 'Italianno', cursive; font-size:40px; margin-bottom:6px;">Guest Gallery</h1>
        <p style="color:#666;margin-bottom:14px;">Upload your photos — latest are shown below.</p>

        <div class="upload-card">
            <form method="post" action="{{ route('gallery.upload') }}" enctype="multipart/form-data" style="display:flex;gap:8px;align-items:center;">
                @csrf
                <input type="file" name="photo" accept="image/*" required>
                <button class="btn" type="submit">Upload</button>
            </form>
        </div>

        @if(session('success'))<div style="color:green;margin-top:8px">{{ session('success') }}</div>@endif
        @if($errors->any())<div style="color:#b00020;margin-top:8px">{{ $errors->first() }}</div>@endif
    </div>

    <div class="grid">
        @foreach($photos as $p)
            <div class="polaroid">
                <!-- Try export=download for images -->
                <img src="{{ 'https://drive.google.com/uc?id='.$p->drive_id }}" alt="{{ $p->original_name }}" loading="lazy">
                <div class="caption">{{ \Illuminate\Support\Str::limit($p->original_name, 30) }}</div>
            </div>
        @endforeach
    </div>
</body>
</html>