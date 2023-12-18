<div x-cloak x-data="{ showModal: false , headline: 'hello' , content: 'content Here' ,image: ''}"
     @open-modal.window="showModal=$event.detail.open"

>
    <div
        x-on:click.away="showModal=false"
        @open-modal.window="modal-id=$event.detail.id"
        class="relative z-50"
        :id="modal-id"
        aria-labelledby="modal-title" role="dialog" aria-modal="true" x-show="showModal" >

        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <!--
                  Modal panel, show/hide based on modal state.

                  Entering: "ease-out duration-300"
                    From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    To: "opacity-100 translate-y-0 sm:scale-100"
                  Leaving: "ease-in duration-200"
                    From: "opacity-100 translate-y-0 sm:scale-100"
                    To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                -->
                <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm: sm:max-w-lg sm:p-6"
                >
                    <div>
                        <div class="-px-4 -pt-5 flex  items-center justify-center rounded-full bg-green-100"  @open-modal.window="headline=$event.detail.headline" >
                            <!-- Heroicon name: outline/check -->
                            <img
                                @open-modal.window="image=$event.detail.image"
                                class="object-cover shadow-lg rounded h-2/3 w-auto" :src="image"
                                x:bind.alt="headline">
                        </div>
                        <div class="mt-3 text-center sm:mt-5">
                            <h3 class="text-2xl font-bold leading-6 text-gray-900" id="modal-title" @open-modal.window="headline=$event.detail.headline" x-html="headline"></h3>
                            <div class="mt-2">
                                <p class="text-md whitespace-normal tracking-normal leading-relaxed text-gray-500 prose text-justify" @open-modal.window="content=$event.detail.content" x-html="content"> </p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3 justify-items-center mx-auto">
                        <button  @click="showModal=false"
                                 type="button"
                                 class="mt-3 inline-flex  justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:col-start-1 sm:mt-0 sm:text-sm">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
