<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>

<div>
<p>{!! $title !!} site visit request during the {!! $time !!} period on {!! $date !!} by {!! $customer !!} Contact each other via {!! $customerE !!}, {!! $customerP !!}, or {!! $customerT !!}</p>

@if($optional != null)
    <p>Additional Input by Customer: {!! $optional !!}</p>
@endif


</div>

</body>
</html>