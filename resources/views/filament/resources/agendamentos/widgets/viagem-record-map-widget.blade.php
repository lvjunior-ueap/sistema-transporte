<x-filament-widgets::widget>
    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
        <div class="grid gap-0 xl:grid-cols-[1.05fr_0.95fr]">
            <div class="border-b border-slate-200 bg-gradient-to-br from-slate-950 via-slate-900 to-cyan-950 p-6 text-white xl:border-b-0 xl:border-r">
                <p class="text-xs uppercase tracking-[0.3em] text-cyan-200/80">Mapa da Viagem</p>
                <h3 class="mt-2 text-2xl font-semibold">
                    {{ $record?->origem }} → {{ $record?->destino }}
                </h3>
                <p class="mt-2 max-w-xl text-sm text-slate-300">
                    Painel visual da rota cadastrada, com acesso rapido aos mapas externos para navegacao ou conferencia.
                </p>

                <div class="mt-6 grid gap-3 md:grid-cols-2">
                    <div class="rounded-2xl border border-white/10 bg-white/8 p-4">
                        <p class="text-xs uppercase tracking-[0.25em] text-slate-400">Saida</p>
                        <p class="mt-2 text-lg font-semibold text-white">{{ $record?->origem }}</p>
                        <p class="mt-1 text-sm text-slate-300">
                            {{ $record?->data_saida?->format('d/m/Y H:i') ?? '-' }}
                        </p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-white/8 p-4">
                        <p class="text-xs uppercase tracking-[0.25em] text-slate-400">Retorno</p>
                        <p class="mt-2 text-lg font-semibold text-white">{{ $record?->destino }}</p>
                        <p class="mt-1 text-sm text-slate-300">
                            {{ $record?->data_retorno?->format('d/m/Y H:i') ?? 'Sem retorno previsto' }}
                        </p>
                    </div>
                </div>

                <div class="mt-4 grid gap-3 md:grid-cols-3">
                    <div class="rounded-2xl border border-white/10 bg-black/15 p-4">
                        <p class="text-xs uppercase tracking-[0.25em] text-slate-400">Motorista</p>
                        <p class="mt-2 text-sm font-medium text-white">{{ $record?->motorista?->nome ?? 'A definir' }}</p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-black/15 p-4">
                        <p class="text-xs uppercase tracking-[0.25em] text-slate-400">Veiculo</p>
                        <p class="mt-2 text-sm font-medium text-white">{{ $record?->veiculo?->modelo ?? '-' }}</p>
                        <p class="text-xs text-slate-300">{{ $record?->veiculo?->placa ?? '' }}</p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-black/15 p-4">
                        <p class="text-xs uppercase tracking-[0.25em] text-slate-400">Duracao</p>
                        <p class="mt-2 text-sm font-medium text-white">{{ $duracao ?? 'Nao informada' }}</p>
                    </div>
                </div>

                <div class="mt-6 flex flex-wrap gap-3">
                    <a
                        href="{{ $googleUrl }}"
                        target="_blank"
                        rel="noreferrer"
                        class="rounded-full bg-white px-4 py-2 text-sm font-medium text-slate-900 transition hover:bg-slate-100"
                    >
                        Abrir no Google Maps
                    </a>

                    <a
                        href="{{ $osmUrl }}"
                        target="_blank"
                        rel="noreferrer"
                        class="rounded-full bg-cyan-400/12 px-4 py-2 text-sm font-medium text-cyan-100 transition hover:bg-cyan-400/20"
                    >
                        Abrir no OpenStreetMap
                    </a>
                </div>
            </div>

            <div class="min-h-[420px] bg-slate-100 p-2">
                <iframe
                    src="{{ $embedUrl }}"
                    class="h-full min-h-[404px] w-full rounded-[1.4rem] border-0"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allowfullscreen
                ></iframe>
            </div>
        </div>
    </div>
</x-filament-widgets::widget>
