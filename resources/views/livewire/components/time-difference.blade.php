<div>
    <div x-data="{
        timestamp: @entangle('timestamp'),
        diff: { years: 0, months: 0, days: 0, hours: 0, minutes: 0, seconds: 0 },
        init() {
            this.calculateDiff();
            setInterval(() => {
                this.calculateDiff();
            }, 1000);

            // Escuta o evento 'timestamp-updated' disparado pelo Livewire
            window.addEventListener('timestamp-updated', event => {
                this.timestamp = event.detail.timestamp;
                this.calculateDiff();
            });
        },
        async calculateDiff() {
            if (this.timestamp) {
                const response = await @this.call('getTimeDifference');
                this.diff = {
                    years: Math.floor(response.years),
                    months: Math.floor(response.months),
                    days: Math.floor(response.days),
                    hours: Math.floor(response.hours),
                    minutes: Math.floor(response.minutes),
                    seconds: Math.floor(response.seconds)
                };
            }
        }
    }" x-init="init" style="background-color: {{ $bg_color }};"
        class="flex items-center justify-between p-4 text-lg border rounded-lg bottom-1">
        <!-- Anos -->
        <div class="text-center" style="color: {{ $text_color }};">
            <span x-text="diff.years" class="block font-bold"></span>
            <span class="text-xs">Anos</span>
        </div>

        <!-- Meses -->
        <div class="text-center" style="color: {{ $text_color }};">
            <span x-text="diff.months" class="block font-bold"></span>
            <span class="text-xs">Meses</span>
        </div>

        <!-- Dias -->
        <div class="text-center" style="color: {{ $text_color }};">
            <span x-text="diff.days" class="block font-bold"></span>
            <span class="text-xs">Dias</span>
        </div>

        <!-- Horas -->
        <div class="text-center" style="color: {{ $text_color }};">
            <span x-text="diff.hours" class="block font-bold"></span>
            <span class="text-xs">Horas</span>
        </div>

        <!-- Minutos -->
        <div class="text-center" style="color: {{ $text_color }};">
            <span x-text="diff.minutes" class="block font-bold"></span>
            <span class="text-xs">Minutos</span>
        </div>

        <!-- Segundos -->
        <div class="text-center" style="color: {{ $text_color }};">
            <span x-text="diff.seconds" class="block font-bold"></span>
            <span class="text-xs">Segundos</span>
        </div>
    </div>
</div>