@extends('User.Layout.layout')
@section('title', 'Home')

@section('sidebar')

    <header id="home">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img class="img-fluid"
                             src="storage/image/slider.jpg" alt="">
                    </div>

                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
        </div>
        <script>
            let swiper = new Swiper('.swiper-container', {
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                autoplay: {
                    delay: 5000,
                }
            });
        </script>
    </header>
@endsection


@section('content')
    <div class="rate">
        <div class="container">
            <div>
                <span class="heading">Rate</span>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Method</th>
                                <th>Rate</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Method</th>
                                <th>Rate</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact" id="contact">
        <div class="container">
            <h3>Contact</h3>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter your name">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Enter your email">
                                    </div>
                                </div>
                            </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="Subject" class="form-control" placeholder="Enter your subject">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea class="form-control" rows="6" placeholder="Enter your message"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
    </div>

    <div class="about">
        <h3>About</h3>
        <div class="container">
            <div class="row">
                <p style="font-size:16px; padding:20px 10px">
                    আমাদের মধ্যে অনেকেই অনলাইনে ছোট-খাটো কাজ করেন ও অল্প পরিমাণ ডলার ইনকাম করেন।
                    আবার অনেক সময় ডোমেইন/হোস্টিং বা অন্য কোনো পণ্য পারচেস করার জন্য কারো কারো সামান্য
                    পরিমান ডলারের প্রয়োজন হয়। সেক্ষেত্রে এতো অল্প পরিমাণ ডলার কোনো ব্যাংক বা আর্থিক প্রতিষ্ঠানের
                    কাছে বিক্রি করতে পারেন না এবং নিজেদের প্রয়োজন মতো ডলার ব্যাংকের মাধ্যমে কিনতেও পারেন না।
                    তাই ফেসবুকসহ বিভিন্ন সোশ্যাল মিডিয়াতে যোগাযোগ করে কারো কাছ থেকে ডলার কিনতে গিয়ে এবং
                    ইনকাম করা ডলার কারো কাছে বিক্রি করতে গিয়ে প্রায়ই প্রতারণার শিকার হতে হয়। তাদের কথা চিন্তা
                    করেই আমাদের এ প্রয়াস। এখানে ক্রয়-বিক্রয়ের রেট একটু কম/বেশি হলেও আপনারা সম্পূর্ণ নিশ্চিন্তে
                    ক্রয়-বিক্রয় করতে পারবেন। আশা করি আপনারা পাশে থাকবেন এবং প্রয়োজনীয় পরামর্শ দিয়ে
                    আমাদের সাহায্য করবেন। <br><br><br>

                    <strong style="color:red">www.usdbd24com বিশেষ দ্রষ্টব্যঃ</strong> আমাদের সেবা গ্রহণ করে অনলাইন জুয়া,
                    অর্থ পাচার (মানি লন্ডারিং), সন্ত্রাসী কর্মকাণ্ড বা এজাতীয়
                    যেকোনো অপরাধজনিত কাজ করা সম্পূর্ণভাবে নিষিদ্ধ। অপরাধের জন্য
                    এ সার্ভিস ব্যবহার করলে USDBD24 কর্তৃপক্ষ কোনোভাবেই দায়ী থাকবে না।</p>
            </div>
        </div>
    </div>
@endsection
