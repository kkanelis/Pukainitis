<x-layout>
    <x-slot:title>Veidojam profilu</x-slot:title>

    <div style="max-width: 450px; margin: 40px auto; padding: 30px; background: #fff8f0; border-radius: 12px; border: 1px solid #ead4c1;">
        <h1 style="font-size: 28px; color: #8b6f47; margin-bottom: 30px; text-align: center; font-weight: 700;">Izveido savu profilu</h1>
        
        <form action="/register" method="POST">
            @csrf

            <div style="margin-bottom: 18px;">
                <label style="display: block; margin-bottom: 6px; color: #8b6f47; font-weight: 600;" for="first_name">Vārds *</label>
                <input style="width: 100%; padding: 10px; border: 1px solid #ead4c1; border-radius: 6px; font-size: 14px;" type="text" id="first_name" name="first_name" value="{{ old("first_name") }}" required>
                @error('first_name')
                    <span style="color: #c85a38; font-size: 12px; display: block; margin-top: 4px;">{{ $message }}</span>
                @enderror
            </div>
            
            <div style="margin-bottom: 18px;">
                <label style="display: block; margin-bottom: 6px; color: #8b6f47; font-weight: 600;" for="last_name">Uzvārds *</label>
                <input style="width: 100%; padding: 10px; border: 1px solid #ead4c1; border-radius: 6px; font-size: 14px;" type="text" id="last_name" name="last_name" value="{{ old("last_name") }}" required>
                @error('last_name')
                    <span style="color: #c85a38; font-size: 12px; display: block; margin-top: 4px;">{{ $message }}</span>
                @enderror
            </div>
            
            <div style="margin-bottom: 18px;">
                <label style="display: block; margin-bottom: 6px; color: #8b6f47; font-weight: 600;" for="email">Epasts *</label>
                <input style="width: 100%; padding: 10px; border: 1px solid #ead4c1; border-radius: 6px; font-size: 14px;" type="email" id="email" name="email" value="{{ old("email") }}" required>
                @error('email')
                    <span style="color: #c85a38; font-size: 12px; display: block; margin-top: 4px;">{{ $message }}</span>
                @enderror
            </div>
            
            <div style="margin-bottom: 18px;">
                <label style="display: block; margin-bottom: 6px; color: #8b6f47; font-weight: 600;" for="password">Parole *</label>
                <input style="width: 100%; padding: 10px; border: 1px solid #ead4c1; border-radius: 6px; font-size: 14px;" type="password" id="password" name="password" required>
                @error('password')
                    <span style="color: #c85a38; font-size: 12px; display: block; margin-top: 4px;">{{ $message }}</span>
                @enderror
            </div>
            
            <div style="margin-bottom: 25px;">
                <label style="display: block; margin-bottom: 6px; color: #8b6f47; font-weight: 600;" for="password_confirmation">Parole apstiprināšana *</label>
                <input style="width: 100%; padding: 10px; border: 1px solid #ead4c1; border-radius: 6px; font-size: 14px;" type="password" id="password_confirmation" name="password_confirmation" required>
                @error('password_confirmation')
                    <span style="color: #c85a38; font-size: 12px; display: block; margin-top: 4px;">{{ $message }}</span>
                @enderror
            </div>

            <button style="width: 100%; padding: 12px; background: #c85a38; color: white; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; font-size: 16px; transition: 0.2s;" type="submit">Izveidot profilu</button>
        </form>
    </div>

</x-layout>