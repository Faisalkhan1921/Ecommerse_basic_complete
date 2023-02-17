<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Comment Section</h1>
            <hr>
        </div>

        <div class="col-md-10">
            
         <form action="{{url('add_comment')}}" method="POST">
            @csrf

            <div class="form-group">
                <label for="">Leave a Comment</label>
                <textarea name="comment" class="form-control"  cols="10" rows="2"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn bg-primary text-light form-control">Comment</button>
            </div>
         </form>

         <div class="col-md-6">
            <h1>All Comments</h1>
            <hr>
            @forelse($show_comment as $show_comments)
            <div >
                <h6 class="text-primary" ><b>{{$show_comments->name}}</b></h6>
                <p >{{$show_comments->comment}}</p>

<a class="text-danger" onclick="reply(this)" href="javascript::void(0);" data-Commentid="{{$show_comments->id}}">Reply</a>
                

            </div>
            @foreach($show_reply as $show_replies)
            @if($show_replies->comment_id ==$show_comments->id)
            <div class="ml-3">
                <b>{{$show_replies->name}}</b>
                <p>{{$show_replies->reply}}</p>
                <a class="text-danger" onclick="reply(this)" href="javascript::void(0);" data-Commentid="{{$show_comments->id}}">Reply</a>
            </div>
            @endif
            @endforeach

            @empty
            No Comment Found
            @endforelse

         </div>

         {{-- hidden text area for reply  --}}
         <div class="col-md-6 replydiv" style="display: none">
            
            <form action="{{url('add_reply')}}" method="POST">
                @csrf
            <input type="text" name="commentId" id="commentId" hidden="">
            <textarea name="reply" placeholder="Write Something here" cols="50" rows="3"></textarea>
            <button  type="submit" class="mb-2 btn btn-sm bg-primary text-light">Reply</button>

            <a href="javascript::void(0);" class="btn btn-cancel" onclick="reply_close(this); ">Close</a>
      
        </form>
         </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    //reply is the name of function, caller will find reply functions inside the reply divs we mentioned
    function reply(caller)
    {
        document.getElementById('commentId').value=$(caller).attr('data-Commentid');
        $('.replydiv').insertAfter($(caller));
        $('.replydiv').show();
    }

    function reply_close(caller)
    {
        $('.replydiv').hide();
    }
</script>

{{-- //this will not refresh complete page or tage to to the top. it will keep you at the same positi --}}

<script>
    document.addEventListener("DOMContentLoaded", function(event) { 
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
</script>
