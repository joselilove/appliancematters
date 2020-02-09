<html lang="en" dir="ltr">
<style>
    .star-rating {
        direction: rtl;
        display: inline-block;
        padding: 20px
    }

    .star-rating input[type=radio] {
        display: none
    }

    .star-rating label {
        color: #bbb;
        font-size: 18px;
        padding: 0;
        cursor: pointer;
        -webkit-transition: all .3s ease-in-out;
        transition: all .3s ease-in-out
    }

    .star-rating label:hover,
    .star-rating label:hover~label,
    .star-rating input[type=radio]:checked~label {
        color: #f2b600
    }
</style>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="star-rating">
        <input id="star-5" type="radio" name="rating" value="star-5">
        <label for="star-5" title="5 stars">
            <i class="active fa fa-star" aria-hidden="true"></i>
        </label>
        <input id="star-4" type="radio" name="rating" value="star-4">
        <label for="star-4" title="4 stars">
            <i class="active fa fa-star" aria-hidden="true"></i>
        </label>
        <input id="star-3" type="radio" name="rating" value="star-3">
        <label for="star-3" title="3 stars">
            <i class="active fa fa-star" aria-hidden="true"></i>
        </label>
        <input id="star-2" type="radio" name="rating" value="star-2">
        <label for="star-2" title="2 stars">
            <i class="active fa fa-star" aria-hidden="true"></i>
        </label>
        <input id="star-1" type="radio" name="rating" value="star-1">
        <label for="star-1" title="1 star">
            <i class="active fa fa-star" aria-hidden="true"></i>
        </label>
    </div>
</body>

</html>