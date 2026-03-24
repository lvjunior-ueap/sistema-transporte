@php
    $record = $getRecord();
    $googleUrl = \App\Support\TravelMap::routeUrl($record->origem, $record->destino);
    $osmUrl = \App\Support\TravelMap::routeUrl($record->origem, $record->destino, 'osm');
@endphp

<div class="min-w-[16rem]">
    <div class="rounded-2xl border border-slate-200 bg-gradient-to-br from-white to-slate-50 p-4 shadow-sm">
        <div class="flex items-start justify-between gap-3">
            <div>
                <p class="text-[11px] font-semibold uppercase tracking-[0.25em] text-slate-400">Rota</p>
                <div class="mt-2 flex items-center gap-2 text-sm font-semibold text-slate-900">
                    <span>{{ $record->origem }}</span>
                    <span class="text-cyan-600">→</span>
                    <span>{{ $record->destino }}</span>
                </div>
            </div>

            <span class="rounded-full bg-cyan-50 px-2.5 py-1 text-[11px] font-medium text-cyan-700">
                {{ $record->status }}
            </span>
        </div>

        <p class="mt-3 line-clamp-2 text-xs text-slate-500">
            {{ $record->motivo }}
        </p>

        <div class="mt-4 flex flex-wrap gap-2">
            <a
                href="{{ $googleUrl }}"
                target="_blank"
                rel="noreferrer"
                class="rounded-full bg-slate-900 px-3 py-1.5 text-xs font-medium text-white transition hover:bg-slate-700"
            >
                Google Maps
            </a>

            <a
                href="{{ $osmUrl }}"
                target="_blank"
                rel="noreferrer"
                class="rounded-full bg-slate-100 px-3 py-1.5 text-xs font-medium text-slate-700 transition hover:bg-slate-200"
            >
                OSM
            </a>
        </div>
    </div>
</div>
