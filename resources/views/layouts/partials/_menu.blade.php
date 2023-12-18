<?php
use RyanChandler\FilamentNavigation\Models\Navigation;

$menu = Navigation::fromHandle('header');


?>

            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li class="py-2 border-b-1 border-primary-300/50 md:border-b-0">
                    <a href="{{ url('/') }}" class="block  py-1 text-center  {{ activeLink("/")  ? "border-b-2 border-primary-900 text-gray-900 font-bold " : "    text-gray-800  " }} rounded md:bg-transparent dark:bg-blue-600 md:dark:bg-transparent"  @if(activeLink("/") ) aria-current="page" @endif>{{ str("HOME")->title()->toString() }}</a>
                </li>


                @if(! is_null($menu))
                    @foreach($menu->items as $item)

                        @if(! $item['children'])
                            @php

                                $url =  url($item['data']['url']);


                                if($item['type'] == "external-link"){
                                  $url = $item['data']['url'];
                                }
                            @endphp
                <li class="py-2 border-b-1 border-primary-300/50 md:border-b-0">
                    <a  href="{{ $url }}" class="block py-1 text-center {{ activeLink($item['data']['url'])  ? "border-b-2 border-primary-900 text-secondary-600 font-bold  " : "    text-gray-800  " }} rounded md:bg-transparent dark:bg-blue-600 md:dark:bg-transparent"  @if(activeLink($item['data']['url']) ) aria-current="page" @endif>{{ str($item['label'])->toString() }}</a>
                </li>

                        @else

                <li class="py-2 border-b-1 border-primary-300/50 md:border-b-0">
                    <button

                        id="{{ str($item['label'])->title()->slug()->append('Link')->toString()  }}"
                            data-dropdown-toggle="{{ str($item['label'])->title()->slug()->toString()  }}"
                            class="{{activePrentLink($item['children'])  ? "border-b-2 border-primary-900 text-gray-900  font-bold py-2" : "    text-gray-800  md:border-0  " }} flex items-center text-center justify-center md:justify-between w-full mt-1 py-1  rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-primary-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-primary-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                        {{ str($item['label'])->toString()  }}
                        <svg class="w-2.5 h-2.5 ml-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="{{ str($item['label'])->title()->slug()->toString()  }}" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">


                            @foreach($item['children'] as $child)

                                @php

                                    $url =  url($child['data']['url']);


                                    if($child['type'] == "external-link"){
                                        $url = $child['data']['url'];
                                    }

                                @endphp
                                <li>
                                <a
                                    href="{{ $url }}" class="block px-4 py-2  {{ activeLink($child['data']['url'])  ? "border-b-2 border-primary-900 text-gray-950/80 " : "    text-gray-800  " }} hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"  @if(activeLink($child['data']['url']) ) aria-current="page" @endif>{{ str($child['label'])->toString()  }}</a>
                            </li>
                            @endforeach

                        </ul>

                    </div>
                </li>
                        @endif



                    @endforeach
                @endif
            </ul>


