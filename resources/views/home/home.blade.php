<x-layout>
    <x-slot:title>Pūkainīša meklēšana</x-slot:title>

    <div class="hero" style="background: #f5e6d3; padding: 40px 20px;">
        <div style="max-width: 900px; margin: 0 auto; text-align: center;">
            <h1 style="font-size: 44px; color: #8b6f47; margin-bottom: 20px; font-weight: 700;">Atrodi savus sapņu <span style="color: #c85a38; font-style: italic;">pūkaini</span></h1>
            
            <p style="font-size: 18px; color: #a08968; margin-bottom: 15px; line-height: 1.5;">
                Pūkainītis palīdz tev atrast ideālo kompanjonu. Meklē, spiediet un sāc jaunu draudzību ar savu nākamo pūkainīti!
            </p>
            
            <p style="font-size: 15px; color: #9d7c5d; margin-bottom: 40px;">
                Vai meklē rotaļīgu kucēnu, mājīgu kaķeni vai jebkuru citu spalvainiu - mūsu sistēma tev palīdz atrast ideālo draugu.
            </p>
            
            <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap; margin-bottom: 50px;">
                @auth
                    <a href="/animal" class="btn btn-primary">Sākt meklēšanu</a>
                @else
                    <a href="/register" class="btn btn-primary">Reģistrēties</a>
                    <a href="/login" class="btn btn-secondary">Pieslēgties</a>
                @endauth
            </div>
        </div>
    </div>

    <div style="background: white; padding: 70px 20px;">
        <div style="max-width: 1000px; margin: 0 auto;">
            <h2 style="font-size: 36px; color: #8b6f47; text-align: center; margin-bottom: 50px; font-weight: 700;">Kā tas darbojas</h2>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">
                <div style="background: #fff8f0; padding: 30px; border-radius: 12px; border: 1px solid #ead4c1;">
                    <div style="font-size: 44px; text-align: center; margin-bottom: 15px;">👤</div>
                    <h3 style="font-size: 20px; color: #8b6f47; margin-bottom: 12px; font-weight: 600;">Izveidot profilu</h3>
                    <p style="font-size: 14px; color: #a08968; line-height: 1.5;">Izstāsti mums par sevi, saviem vēlmēm un to, kādu draudzēnu tu meklē.</p>
                </div>

                <div style="background: #fff8f0; padding: 30px; border-radius: 12px; border: 1px solid #ead4c1;">
                    <div style="font-size: 44px; text-align: center; margin-bottom: 15px;">💕</div>
                    <h3 style="font-size: 20px; color: #8b6f47; margin-bottom: 12px; font-weight: 600;">Spiediet un meklējiet</h3>
                    <p style="font-size: 14px; color: #a08968; line-height: 1.5;">Pārlūko dzīvniekus un spiediet pa labi vai pa kreisi. Sistēma atradīs tavu ideālo kompanjonu!</p>
                </div>

                <div style="background: #fff8f0; padding: 30px; border-radius: 12px; border: 1px solid #ead4c1;">
                    <div style="font-size: 44px; text-align: center; margin-bottom: 15px;">🏠</div>
                    <h3 style="font-size: 20px; color: #8b6f47; margin-bottom: 12px; font-weight: 600;">Satikties un adoptēt</h3>
                    <p style="font-size: 14px; color: #a08968; line-height: 1.5;">Atrod kompaņonu, sazinieties ar patversmi un sāc jaunu dzīvi kopā!</p>
                </div>
            </div>
        </div>
    </div>

    <div style="background: linear-gradient(135deg, #fff8f0 0%, #f5e6d3 100%); padding: 70px 20px; text-align: center;">
        <div style="max-width: 700px; margin: 0 auto;">
            <h2 style="font-size: 36px; color: #8b6f47; margin-bottom: 18px; font-weight: 700;">Vai tu esi gatavs atrast savu pūkainīti?</h2>
            <p style="font-size: 16px; color: #a08968; margin-bottom: 40px; line-height: 1.6;">Pievienojies tūkstošiem laimīgo cilvēku, kuri atraduši savu ideālo draugu!</p>
            
            @auth
                <a href="/animal" class="btn btn-primary" style="padding: 16px 50px; font-size: 17px;">Sākt meklēšanu</a>
            @else
                <a href="/register" class="btn btn-primary" style="padding: 16px 50px; font-size: 17px;">Sākt tagad</a>
            @endauth
        </div>
    </div>

</x-layout>