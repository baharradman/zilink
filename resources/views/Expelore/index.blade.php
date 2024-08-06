<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Categories</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        #category-list,
        #shop-list {
            width: 100%;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin: 5px 0;
        }

        a {
            text-decoration: none;
            color: blue;
            cursor: pointer;
        }

        .a:hover {
            text-decoration: none;
        }

        .subcategory {
            display: none;
        }
    </style>
</head>

<body style="direction: rtl;" class="">
    <div class="mx-5" style="width: 1250px;">
        <div id="category-list" class="my-4 border-bottom">
            <ul class="d-flex justify-content-start">
                @foreach($categories as $category)
                @if ($category->parent_id===Null)
                <li class="mx-2">
                    <a href="#" class="category-link" data-id="{{ $category->id }}" onclick="toggleSubcategory('{{ $category->id }}')">
                        <div class="card " style="width:10rem;background-color:lightgrey;">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <h4 class="text-dark">{{$category->name}}</h4>
                                <img src="{{asset($category->image)}}" alt="" style="height: 40px; width:40px">
                            </div>
                        </div>
                    </a>
                    @if($category->children)
                    @foreach ($category->children as $child)
                    <a id="{{$category->id}}" class="category subcategory mt-3 bg-light" data-id="{{ $child->id }}">
                        <ul class="card-body d-flex  align-items-center justify-content-center ">
                            <li class=" d-flex  align-items-center justify-content-center">
                            <img src="{{asset($child->image)}}" alt="" style="height:20px; width: 20px;">
                            <h5 class="text-dark mx-2">{{$child->name}}</h5>
                            </li>
                        </ul>
                    </a>
                    @endforeach
                    @endif
                </li>
                @endif
                @endforeach
            </ul>
        </div>
        <div id="shop-list" class="d-flex">
            <ul id="shops">
            </ul>
        </div>
    </div>

    <script>
        function toggleSubcategory(id) {
            var subcategories = document.getElementsByClassName('subcategory');
            for (var i = 0; i < subcategories.length; i++) {
                if (subcategories[i].id !== id) {
                    subcategories[i].style.display = "none";
                }
            }
            var subcategory = document.getElementById(id);
            if (subcategory.style.display === "none" || subcategory.style.display === "") {
                subcategory.style.display = "block";
            } else {
                subcategory.style.display = "none";
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.category-link').on('click', function(e) {
                e.preventDefault();
                var categoryId = $(this).data('id');

                $.ajax({
                    url: '/expelore/' + categoryId,
                    method: 'GET',
                    success: function(html) {
                        $('#shop-list').html(html);
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX error: ", status, error);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.category').on('click', function(e) {
                e.preventDefault();
                var categorychildId = $(this).data('id');

                $.ajax({
                    url: '/expelore/' + categorychildId,
                    method: 'GET',
                    success: function(html) {
                        $('#shop-list').html(html);
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX error: ", status, error);
                    }
                });
            });
        });
    </script>
</body>

</html>