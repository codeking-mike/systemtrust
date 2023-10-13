@if (session()->has('message'))
   <div x-data="{show: true}" x-init="setTimeout(()=> show = false, 3000)" x-show="show" class="alert alert-info text-white px-3 py-3 ">
    <p>{{session('message')}}</p>
    
</div> 
@endif