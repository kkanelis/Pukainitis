<x-layout>

    <x-slot:title>Veidojam profilu</x-slot:title>

    <div class="auth-container">
        <div class="auth-container-header">
            <h1>Izveido savu profilu</h1>
        </div>
        <form action="/register" method="POST" class="auth-form">
            @csrf

            <div class="auth-form-group">
                <label for="first_name">Vārds *</label>
                <input type="text" id="first_name" name="first_name" value="{{ old("first_name") }}" required> 
            </div>
            <div class="auth-form-group">
                <label for="last_name">Uzvārds *</label>
                <input type="text" id="last_name" name="last_name" value="{{ old("last_name") }}" required> 
            </div>
            <div class="auth-form-group">
                <label for="email">Epasts *</label>
                <input type="email" id="email" name="email" value="{{ old("email") }}" required> 
            </div>
            <div class="auth-form-group">
                <label for="password">Parole *</label>
                <input type="password" id="password" name="password" required> 
            </div>
            <div class="auth-form-group">
                <label for="password_confirmation">Parole apstiprināšana *</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required> 
            </div>

            <div class="auth-form-footer">
                <button type="submit">Izveidot profilu</button>
            </div>
        </form>
    </div>


</x-layout>