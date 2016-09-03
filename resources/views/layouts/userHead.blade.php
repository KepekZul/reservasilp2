<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title></title>
<link rel="icon" href="../img/LP2.png">
<script type="text/javascript">
(function titleScroller(text) {
    document.title = text;
    setTimeout(function () {
        titleScroller(text.substr(1) + text.substr(0, 1));
    }, 750);
}(" Laboratorium Pemrograman 2 Info Center "));
</script>
<!-- Bootstrap Core CSS -->
<link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Custom CSS -->
<link href="{{ URL::asset('css/heroic-features.css') }}" rel="stylesheet">