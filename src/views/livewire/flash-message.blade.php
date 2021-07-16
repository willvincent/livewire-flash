<div>
    @if($shown)
    <div class="rounded-r-md {{ $styles['bg-color'] }} border-l-4 {{ $styles['border-color'] }} mb-3 flashMessage">
        <div class="p-4">
            <div class="flex">
                @if ($styles['icon'] ?? false)
                    <div class="flex-shrink-0">
                        <p class="{{ $styles['icon-color'] }}">
                            <i class="{{ $styles['icon'] }}"></i>
                        </p>
                    </div>
                @endif
                <div class="ml-3 text-sm leading-5 font-medium {{ $styles['text-color'] }}">
                    {!! $message['message'] !!}
                </div>
                @if ($message['dismissable'] ?? false)
                <div class="ml-auto pl-3">
                    <div class="-mx-1.5 -my-1.5">
                        <button class="inline-flex rounded-md p-1.5 {{ $styles['text-color'] }} focus:outline-none transition ease-in-out duration-150" wire:click="dismiss">
                        <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="w-full overflow-hidden">
            <div class="w-full {{ $styles['ticker-color'] }} tickDown" style="animation-duration: {{ $message['dismissAfter'] + 0.1 }}s"></div>
        </div>
    </div>
    @endif
    @if($message['dismissAfter'])
        <script>
            var timer = new Timer(function() {
                @this.dismiss();
            }, {{ $message['dismissAfter'] * 1000 }})
        </script>
    @endif
</div>
