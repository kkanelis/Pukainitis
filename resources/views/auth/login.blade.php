<x-layout>
    <x-slot:title>Pieslēdzamies profilam</x-slot:title>

    <div style="max-width: 400px; margin: 60px auto; padding: 30px; background: #fff8f0; border-radius: 12px; border: 1px solid #ead4c1;">
        <h1 style="font-size: 28px; color: #8b6f47; margin-bottom: 30px; text-align: center; font-weight: 700;">Pieslēdzamies profilam</h1>
        
        <form action="/login" method="POST">
            @csrf

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; color: #8b6f47; font-weight: 600;" for="email">Epasts *</label>
                <input style="width: 100%; padding: 10px; border: 1px solid #ead4c1; border-radius: 6px; font-size: 14px;" type="email" id="email" name="email" value="{{ old("email") }}" required>
                @error('email')
                    <span style="color: #c85a38; font-size: 12px; display: block; margin-top: 4px;">{{ $message }}</span>
                @enderror
            </div>
            
            <div style="margin-bottom: 25px;">
                <label style="display: block; margin-bottom: 8px; color: #8b6f47; font-weight: 600;" for="password">Parole *</label>
                <input style="width: 100%; padding: 10px; border: 1px solid #ead4c1; border-radius: 6px; font-size: 14px;" type="password" id="password" name="password" required>
                @error('password')
                    <span style="color: #c85a38; font-size: 12px; display: block; margin-top: 4px;">{{ $message }}</span>
                @enderror
            </div>

            <button style="width: 100%; padding: 12px; background: #c85a38; color: white; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; font-size: 16px; transition: 0.2s;" type="submit">Pieslēgties</button>

        </form>
    </div>

</x-layout>