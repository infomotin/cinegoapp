@php 
        $id = Auth::user()->id;
        $user = App\Models\User::find($id);
    @endphp
<div class="sidebar-widget post-widget">
    <div class="widget-title">
        <h4>User Profile </h4>
    </div>
    <div class="post-inner">
        <div class="post">
            <figure class="post-thumb"><a href="blog-details.html">
                    <img src="{{ !$user->photo ? asset('upload/no_image.jpg') : asset( $user->photo) }}" alt=""></a></figure>
            <h5><a href="blog-details.html">{{ $user->name }} </a></h5>
            <p>{{ $user->email }} </p>
        </div>
    </div>
</div>