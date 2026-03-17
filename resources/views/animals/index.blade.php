<x-layout>
    <x-slot:title>Pūkainīša meklēšana</x-slot:title>

    <div class="animals-container">
        <div class="cards-stack">
            @foreach($animals as $index => $animal)
                <div class="card" data-animal-id="{{ $animal->id }}">
                    <div class="card-image">
                        <img src="{{ asset('storage/' . $animal->image_id) }}" alt="{{ $animal->name }}">
                    </div>
                    <div class="card-content">
                        <h2 class="card-name">{{ $animal->name }}</h2>
                        <p class="card-type">
                            @if ($animal->animal_type == "cat")
                                Kaķis
                            @elseif ($animal->animal_type == "dog")
                                Suns
                            @else
                                Cits
                            @endif
                        </p>
                        <div class="card-stats">
                            @if($animal->years)
                                <div class="stat">
                                    <span class="stat-icon">🎂 Gadi: </span>
                                    <span> {{ $animal->years }} </span>
                                </div>
                            @endif
                            @if($animal->activity_level)
                                <div class="stat">
                                    <span class="stat-icon">🏃‍♂️ Aktivitātes līmenis: </span>
                                    <span>
                                        @if ($animal->activity_level == "low")
                                            Mierīgs
                                        @elseif ($animal->activity_level == "medium")
                                            Vidēji aktīvs
                                        @else
                                            Ļoti aktīvs
                                        @endif
                                    </span>
                                </div>
                            @endif
                            @if($animal->social_level)
                                <div class="stat">
                                    <span class="stat-icon">🌍 Sociālais līmenis: </span>
                                    <span>
                                        @if ($animal->activity_level == "low")
                                            Intraverts
                                        @elseif ($animal->activity_level == "medium")
                                            Ambiverts
                                        @else
                                            Ekstraverts
                                        @endif
                                    </span>
                                </div>
                            @endif
                            @if($animal->sleep_type)
                                <div class="stat">
                                    <span class="stat-icon">🌞 Rīta tips: </span>
                                    <span>
                                        @if ($animal->activity_level == "early")
                                            Agrais putns
                                        @elseif ($animal->activity_level == "late")
                                            Nakts pūce
                                        @else
                                            Jaukts
                                        @endif
                                    </span>
                                </div>
                            @endif
                            @if ($animal->life_style)
                                <div class="stat">
                                    <span class="stat-icon">🔖 Dzīves stils: </span>
                                    <span>
                                        @if ($animal->activity_level == "low")
                                            Mierīgs
                                        @elseif ($animal->activity_level == "medium")
                                            Aktīvs
                                        @else
                                            Haotisks
                                        @endif
                                    </span>
                                </div>
                            @endif
                            @if($animal->temperament)
                                <div class="stat">
                                    <span class="stat-icon">🐣 Temperaments: </span>
                                    <span>
                                        @if ($animal->activity_level == "calm")
                                            Mierīgs
                                        @elseif ($animal->activity_level == "playful")
                                            Rotaļīgs
                                        @else
                                            Dominējošs
                                        @endif
                                    </span>
                                </div>
                            @endif
                            @if($animal->adventure_level)
                                <div class="stat">
                                    <span class="stat-icon">🌲 Piedzīvojumu līmenis: </span>
                                    <span>
                                        @if ($animal->activity_level == "low")
                                            Mazkustīgs
                                        @elseif ($animal->activity_level == "medium")
                                            Jaukts
                                        @else
                                            Pētnieks
                                        @endif
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="empty-state" style="display: none;">
            <h3>Nav vairs neviena pūkainīša!</h3>
            <p>Atsvaidzini lapu, vai gaidi vēlāk</p>
        </div>
    </div>

    <script src="{{ asset('js/animals-swipe.js') }}"></script>

</x-layout>