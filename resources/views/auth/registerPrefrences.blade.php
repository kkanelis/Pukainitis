<x-layout>

    <x-slot:title>Profila prefrences</x-slot:title>
            
        <form action="/registerPrefrences" method="POST">
            @csrf

            <label for="activity_level">Aktivitātes līmenis</label>
            <select id="activity_level" name="activity_level">
                <option value="low">Mazkustīgs</option>
                <option value="medium">Vidēji aktīvs</option>
                <option value="high">Ļoti aktīvs</option>
            </select>

            <label for="social_level">Sociālais līmenis</label>
            <select id="social_level" name="social_level">
                <option value="low">Intraverts</option>
                <option value="medium">Ambiverts</option>
                <option value="high">Ekstraverts</option>
            </select>

            <label for="sleep_type">Miega režīms</label>
            <select id="sleep_type" name="sleep_type">
                <option value="early">Agrais putns</option>
                <option value="late">Nakts pūce</option>
                <option value="mixed">Jaukts</option>
            </select>

            <label for="life_style">Dzīves stils</label>
            <select id="life_style" name="life_style">
                <option value="low">Mierīgs</option>
                <option value="medium">Aktīvs</option>
                <option value="high">Haotisks</option>
            </select>

            <label for="temperament">Temperaments</label>
            <select id="temperament" name="temperament">
                <option value="calm">Mierīgs</option>
                <option value="playful">Rotaļīgs</option>
                <option value="dominanting">Dominējošs</option>
            </select>

            <label for="adventure_level">Piedzīvojumu līmenis</label>
            <select id="adventure_level" name="adventure_level">
                <option value="low">Mājās sēdētajs</option>
                <option value="medium">Jaukts</option>
                <option value="high">Pētnieks</option>
            </select>

            <label for="animal_type">Kurš dzīvnieciņš tevi vairāk piesaista?</label>
            <select id="animal_type" name="animal_type">
                <option value="cat">Kaķis</option>
                <option value="dog">Suns</option>
                <option value="other">Cits</option>
            </select>

            <button type="submit">Pievienot prefrences</button>
        </form>
    </div>

</x-layout>
