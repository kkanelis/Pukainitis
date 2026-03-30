<x-layout>
    <x-slot:title>Profila prefrences</x-slot:title>

    <div style="max-width: 550px; margin: 40px auto; padding: 40px; background: #fff8f0; border-radius: 12px; border: 1px solid #ead4c1; box-shadow: 0 2px 8px rgba(200, 90, 56, 0.08);">
        <h1 style="font-size: 28px; color: #8b6f47; margin-bottom: 10px; text-align: center; font-weight: 700;">Jūsu Prefereces</h1>
        <p style="font-size: 14px; color: #a08968; text-align: center; margin-bottom: 35px;">Izvēlieties dzīvniekus, kas jums piemēroti</p>
        
        <form action="/registerPrefrences" method="POST">
            @csrf

            <div style="margin-bottom: 22px;">
                <label style="display: block; margin-bottom: 8px; color: #8b6f47; font-weight: 600; font-size: 15px;" for="activity_level">Aktivitātes līmenis *</label>
                <select id="activity_level" name="activity_level" style="width: 100%; padding: 11px; border: 1px solid #ead4c1; border-radius: 6px; font-size: 14px; color: #8b6f47; background: white; cursor: pointer; transition: 0.2s; font-family: inherit;" required>
                    <option value="">-- Izvēlieties --</option>
                    <option value="low">Mazkustīgs</option>
                    <option value="medium">Vidēji aktīvs</option>
                    <option value="high">Ļoti aktīvs</option>
                </select>
            </div>

            <div style="margin-bottom: 22px;">
                <label style="display: block; margin-bottom: 8px; color: #8b6f47; font-weight: 600; font-size: 15px;" for="social_level">Sociālais līmenis *</label>
                <select id="social_level" name="social_level" style="width: 100%; padding: 11px; border: 1px solid #ead4c1; border-radius: 6px; font-size: 14px; color: #8b6f47; background: white; cursor: pointer; transition: 0.2s; font-family: inherit;" required>
                    <option value="">-- Izvēlieties --</option>
                    <option value="low">Intraverts</option>
                    <option value="medium">Ambiverts</option>
                    <option value="high">Ekstraverts</option>
                </select>
            </div>

            <div style="margin-bottom: 22px;">
                <label style="display: block; margin-bottom: 8px; color: #8b6f47; font-weight: 600; font-size: 15px;" for="sleep_type">Miega režīms *</label>
                <select id="sleep_type" name="sleep_type" style="width: 100%; padding: 11px; border: 1px solid #ead4c1; border-radius: 6px; font-size: 14px; color: #8b6f47; background: white; cursor: pointer; transition: 0.2s; font-family: inherit;" required>
                    <option value="">-- Izvēlieties --</option>
                    <option value="early">Agrais putns</option>
                    <option value="late">Nakts pūce</option>
                    <option value="mixed">Jaukts</option>
                </select>
            </div>

            <div style="margin-bottom: 22px;">
                <label style="display: block; margin-bottom: 8px; color: #8b6f47; font-weight: 600; font-size: 15px;" for="life_style">Dzīves stils *</label>
                <select id="life_style" name="life_style" style="width: 100%; padding: 11px; border: 1px solid #ead4c1; border-radius: 6px; font-size: 14px; color: #8b6f47; background: white; cursor: pointer; transition: 0.2s; font-family: inherit;" required>
                    <option value="">-- Izvēlieties --</option>
                    <option value="low">Mierīgs</option>
                    <option value="medium">Aktīvs</option>
                    <option value="high">Haotisks</option>
                </select>
            </div>

            <div style="margin-bottom: 22px;">
                <label style="display: block; margin-bottom: 8px; color: #8b6f47; font-weight: 600; font-size: 15px;" for="temperament">Temperaments *</label>
                <select id="temperament" name="temperament" style="width: 100%; padding: 11px; border: 1px solid #ead4c1; border-radius: 6px; font-size: 14px; color: #8b6f47; background: white; cursor: pointer; transition: 0.2s; font-family: inherit;" required>
                    <option value="">-- Izvēlieties --</option>
                    <option value="calm">Mierīgs</option>
                    <option value="playful">Rotaļīgs</option>
                    <option value="dominanting">Dominējošs</option>
                </select>
            </div>

            <div style="margin-bottom: 22px;">
                <label style="display: block; margin-bottom: 8px; color: #8b6f47; font-weight: 600; font-size: 15px;" for="adventure_level">Piedzīvojumu līmenis *</label>
                <select id="adventure_level" name="adventure_level" style="width: 100%; padding: 11px; border: 1px solid #ead4c1; border-radius: 6px; font-size: 14px; color: #8b6f47; background: white; cursor: pointer; transition: 0.2s; font-family: inherit;" required>
                    <option value="">-- Izvēlieties --</option>
                    <option value="low">Mājās sēdētajs</option>
                    <option value="medium">Jaukts</option>
                    <option value="high">Pētnieks</option>
                </select>
            </div>

            <div style="margin-bottom: 30px;">
                <label style="display: block; margin-bottom: 8px; color: #8b6f47; font-weight: 600; font-size: 15px;" for="animal_type">Kurš dzīvnieciņš tevi vairāk piesaista? *</label>
                <select id="animal_type" name="animal_type" style="width: 100%; padding: 11px; border: 1px solid #ead4c1; border-radius: 6px; font-size: 14px; color: #8b6f47; background: white; cursor: pointer; transition: 0.2s; font-family: inherit;" required>
                    <option value="">-- Izvēlieties --</option>
                    <option value="cat">Kaķis</option>
                    <option value="dog">Suns</option>
                    <option value="other">Cits</option>
                </select>
            </div>

            <button type="submit" style="width: 100%; padding: 13px; background: #c85a38; color: white; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; font-size: 16px; transition: 0.2s ease; box-shadow: 0 2px 6px rgba(200, 90, 56, 0.2);">Pievienot prefrences</button>
        </form>
    </div>

</x-layout>
