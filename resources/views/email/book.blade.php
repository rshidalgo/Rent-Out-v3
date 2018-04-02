<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>

<div>
     {!! $name !!}
     <p>Your booking request for (insert $post->title here) in (insert $post->condos['name'] has been sent 
         to (insert $condo->pspecialist['name'])). He will reply to you shortly regarding this transaction. 
        Regards.</p>

        @component('mail::button', ['url' => '/email/book', 'color' => 'green'])
        view order
        @endcomponent
</div>


</body>
</html>