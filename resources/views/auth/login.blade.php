<x-layout>

    <x-slot:title>Pieslēdzamies profilam</x-slot:title>

    <div class="auth-container">
        <div class="auth-container-header">
            <h1>Pieslēdzamies profilam</h1>
        </div>
        <form action="/login" method="POST" class="auth-form">
            @csrf

            <div class="auth-form-group">
                <label for="email">Epasts *</label>
                <input type="email" id="email" name="email" value="{{ old("email") }}" required> 
            </div>
            <div class="auth-form-group">
                <label for="password">Parole *</label>
                <input type="password" id="password" name="password" required> 
            </div>

            <div class="auth-form-footer">
                <button type="submit">Pieslēgties</button>
            </div>

        </form>
    </div>


</x-layout>