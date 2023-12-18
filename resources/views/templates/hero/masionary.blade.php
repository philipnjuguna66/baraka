




{{--

<div class="mx-auto w-4/5 mt-40">
    <div class="max-w-7xl py-8 px-4 ">


        @foreach($masonrySections as $index => $masonrySection)
            <div class="grid grid-cols-2 gap-x-3 gap-y-1.5">

                @if($loop->even)
                    <div class=" py-2 flex flex-col">

                        <div class="mb-2">
                            <div class="bg-white py-2 px-4">
                                <div class="flex">
                                    <div>
                                        <div class="text-xl font-bold py-2">
                                            {{ $masonrySection['title'] }}
                                        </div>
                                        <div class="py-4 px-8 ">
                                           {{ $masonrySection['description'] }}.
                                        </div>
                                    </div>
                                    <div class="">
                                        <img loading="lazy" src="{{ \Illuminate\Support\Facades\Storage::url($masonrySection['image']) }}">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <div class="bg-white py-2 px-4">
                                <div class="flex">
                                    <div>
                                        <div class="text-xl font-bold py-2">
                                            <h2>Our Story</h2>
                                        </div>
                                        <div class="py-4 px-8 ">
                                            We seek to create opportunities for kenyans to be a part of our growth with a view to transforming their lives.
                                        </div>
                                    </div>
                                    <div class="">
                                        <img src="https://www.safaricom.co.ke/images/commitments.jpeg">
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
            </div>
            <div class=" py-2">
                <div class="bg-white">
                    <div>
                        <img src="https://www.safaricom.co.ke/images/commitments.jpeg">
                    </div>
                    <div class="text-custom-50">
                        Our Story
                    </div>
                    <div class="">
                        We seek to create opportunities for kenyans to be a part of our growth with a view to transforming their lives.
                    </div>
                </div>

            </div>

            @else
                <div class=" py-2">
                    <div class="bg-white">
                        <div>
                            <img src="https://www.safaricom.co.ke/images/commitments.jpeg">
                        </div>
                        <div class="py-4 px-4">
                            <div class="text-xl font-bold ">
                                Our Story
                            </div>
                            <div class="">
                                We seek to create opportunities for kenyans to be a part of our growth with a view to transforming their lives.
                            </div>
                        </div>
                    </div>

                </div>
                <div class=" py-2  flex flex-col">

                    <div class="mb-2">
                        <div class="bg-white py-2 px-4">
                            <div class="flex">
                                <div>
                                    <div class="text-custom-50">
                                        Our Story
                                    </div>
                                    <div class="">
                                        We seek to create opportunities for kenyans to be a part of our growth with a view to transforming their lives.
                                    </div>
                                </div>
                                <div class="">
                                    <img src="https://www.safaricom.co.ke/images/commitments.jpeg">
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="mb-2">
                        <div class="bg-white py-2 px-4">
                            <div class="flex">
                                <div>
                                    <div class="text-custom-50">
                                        Our Story
                                    </div>
                                    <div class="">
                                        We seek to create opportunities for kenyans to be a part of our growth with a view to transforming their lives.
                                    </div>
                                </div>
                                <div class="">
                                    <img src="https://www.safaricom.co.ke/images/commitments.jpeg">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endif
    </div>
    @endforeach
</div>

--}}
