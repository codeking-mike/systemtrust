@if (session()->has('message'))
   <div class="modal alert alert-success alert-dismissible fade show " role="alertdialog">
<p>{{session('message')}}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div> 
@endif