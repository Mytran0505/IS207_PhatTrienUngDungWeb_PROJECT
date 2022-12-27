@foreach($comments as $comm)
    <div width="100%" class="p-3">
        <img src="/template/images/Logo/user.png" alt="TranAnhHuy" class="p-b-10 m-r-3 m-t-3 rounded-circle"
            style="width:60px;">
        <div class="media-body" style="width: 90%; padding-bottom: 20px; padding-right:20px; display: inline-block;">
            <h4 style="color: #0054ff" class="p-t-10 p-l-10">{{ $comm->cus->name }}<small><i class="fs-9 p-l-7">Đăng vào {{ $comm->created_at }}</i></small>
            </h4>
            <p style="font-weight: 500; font-size: 18px; color: #000;" class="p-t-10 p-l-10 p-b-10">
                {{ $comm->content }}

            </p>
            <?php
            $CustomerId= Session::get('customerId');
            if($CustomerId) { ?>
                <p>
                    <a style="border-radius: 20px;
                    font-size: 12px;
                    padding: 5px 15px;
                    background: #939393;
                    color: #333;
                    border: 1px solid #939393;
                    margin-bottom: 10px;
                    margin-left: 10px;"
                        class="btn btn-sm btn-primary b-r-15 btn-show-reply-form" data-id="{{$comm->id}}" href="">Trả lời</a>
                </p>
            <?php } else { ?>
                <button type="button"
                    style="border-radius: 20px;
                            font-size: 12px;
                            padding: 5px 15px;
                            background: #ffe25c;
                            color: #8e0000;
                            border: 1px solid #939393;
                            margin-bottom: 10px;
                            margin-left: 10px;"
                    class="btn btn-sm btn-primary b-r-15" {{-- style ="min-width: 70px; height: 30px; padding: 20px; "
                    class="flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 trans-04"  --}} data-toggle="modal" data-target="#myModal">Trả
                    lời</button>
            <?php } ?>
            <form style="display:none;"class="p-l-10 p-b-10 p-r-10 formReply form-reply-{{$comm->id}}" action="" method="POST" role="form">
                <div class="m-b-20 b-r-15">
                    <textarea class="b-r-15 form-control" id="content-reply-{{$comm->id}}" placeholder="Nhập nội dung (*)"></textarea>
                </div>

                <button style="min-width: 70px; height: 30px " type="submit"
                data-id="{{$comm->id}}"    
                class="btn-send-comment-reply flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 trans-04">
                    Gửi
                </button>
            </form>

            {{-- //  Các bình luận con --}}
            <hr>
            @foreach($comm->replies as $child)
            <div class="b-r-15 m-b-10 m-l-20 m-r-10 p-b-20">
                <h4 style="color: #870000" class="p-t-10 p-l-10">{{ $child->cus->name }} <small><i class="fs-9 p-l-7">Trả lời lúc: {{ $child->created_at }}</i></small></h4>
                <p style="font-weight: 500; font-size: 18px; color: #000;" class="p-t-10 p-l-10 p-b-10">
                    {{ $child->content }}    
                </p>
                <p>
                    <a style="border-radius: 20px;
                    font-size: 12px;
                    padding: 5px 15px;
                    background: #939393;
                    color: #333;
                    border: 1px solid #939393;
                    margin-bottom: 10px;
                    margin-left: 10px;"
                        class="btn btn-sm btn-primary b-r-15 btn-show-reply-form" data-id="{{$child->id}}" href="">Trả lời</a>
                </p>
                <form style="display:none;"class="p-l-10 p-b-10 p-r-10 formReply form-reply-{{$child->id}}" action="" method="POST" role="form">
                    <div class="m-b-20 b-r-15">
                        <textarea class="b-r-15 form-control" id="content-reply-{{$child->id}}" placeholder="Nhập nội dung (*)"></textarea>
                    </div>
    
                    <button style="min-width: 70px; height: 30px " type="submit"
                            data-id="{{$child->id}}"    
                            class="btn-send-comment-reply flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 trans-04">
                        Gửi
                    </button>
                </form>

                {{-- Duyet de quy lan 3 --}}
                <hr>
                @foreach($child->replies as $child1)
                <div class="b-r-15 m-b-20 m-l-20 m-r-20">
                    <h4 class="p-t-10 p-l-10">{{ $child1->cus->name }} <small><i class="fs-9 p-l-7">Trả lời lúc: {{ $child1->created_at }}</i></small></h4>
                    <p style="font-weight: 500; font-size: 18px; color: #000;" class="p-t-10 p-l-10 p-b-10">
                        {{ $child1->content }}    
                    </p>
                </div>
                @endforeach
                {{-- Duyet de quy lan 3 --}}
            </div>
            @endforeach
        </div>
    </div>
@endforeach