<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Comment added</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.6;
            color: #333333;
            background-color: #f7f7f7;
            padding: 20px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin-top: 0;
            margin-bottom: 0.5rem;
            font-weight: 700;
            line-height: 1.2;
        }

        h5 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        img {
            display: inline-block;
            vertical-align: middle;
            border-style: none;
            border-radius: 50%;
            margin-right: 10px;
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            color: #fff;
            text-align: center;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: #007bff;
            border: 1px solid #007bff;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.15s ease-in-out;
        }
        
        .rey-btn {
            border: 2px solid #0062cc;
            padding: 10px 40px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 13px;
            font-weight: 700;
            border-radius: 50px;
            transition: all 0.3s;
        }

        .btn:hover {
            border-radius: 20px solid #070707;
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .link-muted {
            color: #aaa;
        }

        .link-muted:hover {
            color: #1266f1;
        }
    </style>
    <link rel="stylesheet" href="/assets/css/base.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    @foreach($comments as $comment)

    <section style="padding:20px;">
        <div class="container my-5 py-5 text-dark">
            <center>
                <h1 class="text-white" style="align-content: center; color:gray;"> New Comment Added 😊</h1>
            </center>
            <div class="row d-flex justify-content-center">
                <div class="col-md-11 col-lg-9 col-xl-7">
                    <div class="d-flex flex-start mb-4">
                        <img class="rounded-circle shadow-1-strong me-3" src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp" alt="avatar" width="65" height="65" />
                        <div class="card w-100">
                            <div class="card-body p-4">
                                <div class="">
                                    <h5> Written By : {{Auth::user()->name}}</h5>
                                    <p class="small">{{$comment->created_at->diffForHumans()}} </p>
                                    <p>
                                        {{$comment->comments}}
                                    </p>

                                    <div class="d-flex justify-content-between align-items-center">
                                       
                                        <a href="#!" class="link-muted btn rey-btn" style="color:white;">Reply</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
</body>

</html>