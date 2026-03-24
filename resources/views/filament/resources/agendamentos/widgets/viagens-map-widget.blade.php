<x-filament-widgets::widget>
    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-gradient-to-br from-slate-950 via-slate-900 to-cyan-950 text-white shadow-sm">
        <div class="grid gap-6 p-6 xl:grid-cols-[1.35fr_0.95fr]">
            <div>
                <div class="mb-4 flex items-center justify-between gap-4">
                    <div>
                        <p class="text-xs uppercase tracking-[0.3em] text-cyan-200/80">Malha de Viagens</p>
                        <h3 class="mt-1 text-xl font-semibold text-white">Mapa rapido das rotas entre cidades</h3>
                        <p class="mt-1 max-w-2xl text-sm text-slate-300">
                            Visao esquematica da operacao entre Macapa, Oiapoque, Mazagao, Santana e Laranjal do Jari.
                        </p>
                    </div>

                    <a
                        href="https://www.google.com/maps/search/?api=1&query=Macapa%2C+Amapa%2C+Brasil"
                        target="_blank"
                        rel="noreferrer"
                        class="inline-flex items-center rounded-full bg-white/10 px-4 py-2 text-sm font-medium text-white transition hover:bg-white/20"
                    >
                        Abrir mapa geral
                    </a>
                </div>

                <div class="rounded-[1.75rem] border border-white/10 bg-white/5 p-4">
                    <svg viewBox="0 0 100 100" class="h-[340px] w-full">
                        <defs>
                            <linearGradient id="travelGrid" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#164e63" stop-opacity="0.32" />
                                <stop offset="100%" stop-color="#0f172a" stop-opacity="0.05" />
                            </linearGradient>
                        </defs>

                        <rect x="0" y="0" width="100" height="100" rx="10" fill="url(#travelGrid)" />

                        @foreach ($routes as $route)
                            <line
                                x1="{{ $route['origem']['x'] }}"
                                y1="{{ $route['origem']['y'] }}"
                                x2="{{ $route['destino']['x'] }}"
                                y2="{{ $route['destino']['y'] }}"
                                stroke="rgba(103, 232, 249, 0.42)"
                                stroke-width="{{ min(4, 1 + ($route['total'] * 0.4)) }}"
                                stroke-linecap="round"
                            />
                        @endforeach

                        @foreach ($cities as $city)
                            <g>
                                <circle cx="{{ $city['x'] }}" cy="{{ $city['y'] }}" r="3.5" fill="{{ $city['accent'] }}" />
                                <circle cx="{{ $city['x'] }}" cy="{{ $city['y'] }}" r="6.2" fill="{{ $city['accent'] }}" fill-opacity="0.18" />
                                <text x="{{ $city['x'] + 2.8 }}" y="{{ $city['y'] - 2.4 }}" fill="#e2e8f0" font-size="4.1" font-weight="600">
                                    {{ $city['label'] }}
                                </text>
                            </g>
                        @endforeach
                    </svg>
                </div>
            </div>

            <div class="space-y-3">
                <div class="rounded-[1.5rem] border border-white/10 bg-white/6 p-4">
                    <p class="text-xs uppercase tracking-[0.3em] text-cyan-200/80">Rotas em destaque</p>
                    <p class="mt-2 text-sm text-slate-300">
                        As rotas abaixo foram montadas a partir das viagens cadastradas no sistema.
                    </p>
                </div>

                @foreach ($routes as $route)
                    <div class="rounded-[1.5rem] border border-white/10 bg-white/8 p-4 backdrop-blur-sm">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <div class="flex items-center gap-2 text-sm font-semibold text-white">
                                    <span>{{ $route['origem']['label'] }}</span>
                                    <span class="text-cyan-300">→</span>
                                    <span>{{ $route['destino']['label'] }}</span>
                                </div>
                                <p class="mt-1 text-xs uppercase tracking-[0.25em] text-slate-400">
                                    {{ $route['total'] }} viagem(ns) cadastrada(s)
                                </p>
                            </div>

                            <div class="rounded-full bg-cyan-400/12 px-3 py-1 text-xs font-medium text-cyan-200">
                                {{ $route['total'] }}x
                            </div>
                        </div>

                        <div class="mt-4 flex flex-wrap gap-2">
                            <a
                                href="{{ $route['google_url'] }}"
                                target="_blank"
                                rel="noreferrer"
                                class="rounded-full bg-white/10 px-3 py-1.5 text-xs font-medium text-white transition hover:bg-white/20"
                            >
                                Google Maps
                            </a>

                            <a
                                href="{{ $route['osm_url'] }}"
                                target="_blank"
                                rel="noreferrer"
                                class="rounded-full bg-cyan-400/12 px-3 py-1.5 text-xs font-medium text-cyan-100 transition hover:bg-cyan-400/20"
                            >
                                OpenStreetMap
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-filament-widgets::widget>
