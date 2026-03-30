<x-layout>
    <x-slot:title>Pūkainīši izvēlētie</x-slot:title>

    <div class="matches-container">
        @if($animalMatches->isEmpty())
            <div class="no-matches">
                <h2>Vēl nav izvēlēti dzīvnieki</h2>
                <p>Sāc meklēt un svai dzīvniekus, lai tos pievienotu savai izvēlei!</p>
                <a href="/animal" class="btn-primary">Sākt meklēt</a>
            </div>
        @else
            <div class="matches-header">
                <h1>Jūsu izvēlētie pūkainīši</h1>
            </div>

            <div class="matches-grid">
                @foreach($animalMatches as $match)
                    <div class="match-card">
                        <div class="match-image">
                            <img src="{{ asset('storage/' . $match->animal->image_id) }}" alt="{{ $match->animal->name }}" class="animal-img">
                        </div>
                        
                        <div class="match-content">
                            <h3 class="animal-name">{{ $match->animal->name }}</h3>
                            
                            <p class="animal-type">
                                @if ($match->animal->animal_type == "cat")
                                    🐱 Kaķis
                                @elseif ($match->animal->animal_type == "dog")
                                    🐕 Suns
                                @else
                                    🐾 Cits
                                @endif
                            </p>

                            <div class="animal-info">
                            @if($match->animal->years)
                                <div class="stat">
                                    <span>🎂 <b style="color: Orange">Gadi:</b>  {{ $match->animal->years }} </span>
                                </div>
                            @endif
                                @if ($match->animal->animal_type === 'cat')
                                    <div class="stat">
                                        <span>🐱 <b style="color: Orange">Dzimums: </b> {{ $match->animal->gender === 'male' ? 'Runcis' : 'Kaķene' }} </span>
                                    </div>
                                @endif
                                @if ($match->animal->animal_type === 'dog')
                                    <div class="stat">
                                        <span>🐶 <b style="color: Orange">Dzimums: </b> {{ $match->animal->gender === 'male' ? 'Suns' : 'Mātīte' }} </span>
                                    </div>
                                @endif
                                @if($match->animal->animal_type !== 'dog' && $match->animal->animal_type !== 'cat')
                                    <div class="stat">
                                        <span>🐾 <b style="color: Orange">Dzimums: </b> {{ $match->animal->gender === 'male' ? 'Vīriešu pārstāvis' : 'Sieviešu pārstāvis' }} </span>
                                    </div>
                                @endif
                                @if($match->animal->activity_level)
                                <div class="stat">
                                    <span>
                                        🏃‍♂️ <b style="color: Orange">Aktivitātes līmenis: </b>
                                        @if ($match->animal->activity_level == "low")
                                            Mierīgs
                                        @elseif ($match->animal->activity_level == "medium")
                                            Vidēji aktīvs
                                        @else
                                            Ļoti aktīvs
                                        @endif
                                    </span>
                                </div>
                            @endif
                            @if($match->animal->social_level)
                                <div class="stat">
                                    <span>
                                        🌍 <b style="color: Orange">Sociālais līmenis: </b>
                                        @if ($match->animal->activity_level == "low")
                                            Intraverts
                                        @elseif ($match->animal->activity_level == "medium")
                                            Ambiverts
                                        @else
                                            Ekstraverts
                                        @endif
                                    </span>
                                </div>
                            @endif
                            @if($match->animal->sleep_type)
                                <div class="stat">
                                    <span>
                                        🌞 <b style="color: Orange">Rīta tips: </b>
                                        @if ($match->animal->activity_level == "early")
                                            Agrais putns
                                        @elseif ($match->animal->activity_level == "late")
                                            Nakts pūce
                                        @else
                                            Jaukts
                                        @endif
                                    </span>
                                </div>
                            @endif
                            @if ($match->animal->life_style)
                                <div class="stat">
                                    <span>
                                        🔖 <b style="color: Orange">Dzīves stils: </b>
                                        @if ($match->animal->activity_level == "low")
                                            Mierīgs
                                        @elseif ($match->animal->activity_level == "medium")
                                            Aktīvs
                                        @else
                                            Haotisks
                                        @endif
                                    </span>
                                </div>
                            @endif
                            @if($match->animal->temperament)
                                <div class="stat">
                                    <span>
                                        🐣 <b style="color: Orange">Temperaments: </b>
                                        @if ($match->animal->activity_level == "calm")
                                            Mierīgs
                                        @elseif ($match->animal->activity_level == "playful")
                                            Rotaļīgs
                                        @else
                                            Dominējošs
                                        @endif
                                    </span>
                                </div>
                            @endif
                            @if($match->animal->adventure_level)
                                <div class="stat">
                                    <span>
                                        🌲 <b style="color: Orange">Piedzīvojumu līmenis: </b>
                                        @if ($match->animal->activity_level == "low")
                                            Mazkustīgs
                                        @elseif ($match->animal->activity_level == "medium")
                                            Jaukts
                                        @else
                                            Pētnieks
                                        @endif
                                    </span>
                                </div>
                            @endif

                                @if($match->animal->shelter)
                                    <div class="info-section">
                                        <h4 class="shelter-title">🏠 Patversme</h4>
                                        <div class="shelter-info">
                                            <p class="shelter-name">{{ $match->animal->shelter->name }}</p>
                                            <p class="shelter-detail">
                                                📍 {{ $match->animal->shelter->location }}
                                            </p>
                                            <p class="shelter-detail">
                                                📞 {{ $match->animal->shelter->phone_number }}
                                            </p>
                                            <p class="shelter-detail">
                                                ✉️ {{ $match->animal->shelter->email }}
                                            </p>
                                        </div>
                                        <p style="text-align: center" class="shelter-detail">
                                            Ja zini kad šis ir tavs īstais draugs... tad ko gaidi? Zvani un brauc pakaļ viņam!
                                        </p>
                                    </div>
                                @endif
                            </div>

                            <div class="match-actions">
                                <form action="/animals/{{ $match->id }}" method="POST" style="display: inline;" onsubmit="return confirm('Vai tiešām vēlaties noņemt šo dzīvnieku no izvēles?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">🗑️ Noņemt</button>
                                </form>
                                <a href="/animal" class="btn-secondary">Atpakaļ uz meklēšanu</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</x-layout>