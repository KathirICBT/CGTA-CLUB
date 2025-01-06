<div>
    <div class="alert"
        :class="{primary:'alert-primary', success:'alert-success', danger:'alert-danger', warning:'alert-warning'}[(alert.type ?? 'primary')]"
        x-data="{ open:false, alert:{} }"
        x-show="open" x-cloak
        x-transition:enter="animate-alert-show"
        x-transition:leave="animate-alert-hide"
        @alert.window="open = true; setTimeout( () => open=false, 5000 ); alert=$event.detail[0]"
    >
        <div class="alert-wrapper">
            <strong x-html="alert.title"></strong>
            <p x-html="alert.message"></p>
        </div>
        <i class="alert-close fa-solid fa-xmark" @click="open = false"></i>
    </div>    
    <script>
        document.addEventListener('livewire:initialized', () => {
            let obj = @json(session('alert') ?? []);
            if(Object.keys(obj).length) {
                Livewire.dispatch('alert', [ obj ])
            }
        })
    </script>
</div>
