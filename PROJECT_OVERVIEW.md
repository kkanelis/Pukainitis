# PŪKAINĪŠA LIELIE NAMS - COMPLETE PROJECT OVERVIEW

## 1️⃣ What The Project Does (Main Purpose)

This is a **pet adoption matching app** from Latvia. It helps people find dogs or cats that are a good match for their lifestyle. Think of it like a dating app, but for finding your perfect pet! Users swipe through animals at shelters and mark the ones they like. The app uses a smart matching system to show them animals that fit their personality and lifestyle best.

---

## 2️⃣ Main Features (What Users Can Do)

| Feature | What It Does |
|---------|-------------|
| **Register & Login** | Create an account with email/password |
| **Set Preferences** | Tell the app your personality (active/calm, social/shy, etc.) |
| **Swipe Animals** | Scroll through available pets and "like" the ones you want |
| **View Matches** | See all animals you've liked in one place |
| **Remove Matches** | Unlike an animal if you change your mind |
| **See Shelter Info** | Find phone/email/location of each animal's shelter |

---

## 3️⃣ Technologies Used

**Backend:**
- **Laravel 12** - PHP web framework (handling logic, databases, user auth)
- **PHP 8.2+** - Programming language
- **Filament** - Admin panel tool (mentioned in composer.json)
- **SQLite/MySQL** - Database

**Frontend:**
- **Blade** - Laravel templating engine (creates HTML pages)
- **Tailwind CSS** - Styling framework (mentioned in package.json)
- **Vanilla JavaScript** - Plain JS for swipe functionality
- **Vite** - Frontend build tool

**Testing & Development:**
- **PHPUnit** - Testing framework
- **Mockery** - Testing helper
- **Faker** - Generate fake test data

---

## 4️⃣ Database Structure (Tables + Main Fields)

```
┌─────────────────────────────────────────┐
│              USERS TABLE                │
├─────────────────────────────────────────┤
│ id (Primary Key)                        │
│ first_name, last_name                   │
│ email (unique), password                │
│ Preferences:                            │
│  - activity_level (low/medium/high)     │
│  - social_level (introvert/ambivert...)  │
│  - sleep_type (early/late/mixed)        │
│  - life_style                           │
│  - temperament                          │
│  - adventure_level                      │
│  - animal_type (cat/dog)                │
│ admin (boolean), timestamps             │
└─────────────────────────────────────────┘

┌─────────────────────────────────────────┐
│            ANIMALS TABLE                │
├─────────────────────────────────────────┤
│ id (Primary Key)                        │
│ shelter_id (Which shelter has this pet) │
│ name, gender                            │
│ years (age)                             │
│ animal_type (cat/dog/other)             │
│ Characteristics (like users):           │
│  - activity_level                       │
│  - social_level                         │
│  - sleep_type                           │
│  - life_style                           │
│  - temperament                          │
│  - adventure_level                      │
│ image_id (photo file)                   │
│ timestamps                              │
└─────────────────────────────────────────┘

┌─────────────────────────────────────────┐
│          ANIMAL_MATCH TABLE             │
├─────────────────────────────────────────┤
│ id (Primary Key)                        │
│ user_id (who liked it)                  │
│ animal_id (which animal)                │
│ timestamps (when liked)                 │
└─────────────────────────────────────────┘

┌─────────────────────────────────────────┐
│           SHELTERS TABLE                │
├─────────────────────────────────────────┤
│ id (Primary Key)                        │
│ name (shelter name)                     │
│ phone_number, email, location           │
│ timestamps                              │
└─────────────────────────────────────────┘
```

---

## 5️⃣ Backend Structure (Controllers, Models, Logic)

### Controllers (Handle Requests)

**AnimalsController**
```
├─ index()
│  └─ Shows all unmatched animals, sorted by how well they match user preferences
│  └─ Calculates match score (0-10 points per preference match)
│
└─ like(Request $request)
   └─ Saves a user's "like" by creating AnimalMatch record
   └─ Validates the animal_id exists
```

**AnimalsMatchsController**
```
├─ index()
│  └─ Shows all animals the user has liked
│  └─ Fetches matches with related animal and shelter info
│
└─ destroy($id)
   └─ Deletes a like (removes an animal from user's matches)
```

**RegisterController**
```
├─ create()       → Show registration form
├─ store()        → Save basic profile (name, email, password)
├─ createPreferences()  → Show preferences form
└─ storePreferences()   → Save personality preferences
```

**SessionController**
```
├─ create()       → Show login form
├─ store()        → Handle login
└─ destroy()      → Handle logout
```

### Models (Database Objects)

- **Animal** - has name, type, personality traits, image, shelter_id
- **User** - has name, email, password, personality traits
- **AnimalMatch** - links user to animal when liked
- **Shelter** - has name, phone, email, location

### How Matching Works

1. User signs up → fills out personality preferences
2. App gets all animals user hasn't liked yet
3. For each animal, the app calculates a "match score":
   - animal_type match = +5 points
   - Each matching personality trait = +1 point each
4. Animals are sorted by score (best matches first)
5. When user swipes right (likes), AnimalMatch record is created

---

## 6️⃣ Frontend Structure (Views, Pages)

### Pages

| Page | URL | What It Shows |
|------|-----|-------|
| Home | `/` | Landing page (before login) |
| Register | `/register` | Sign-up form |
| Login | `/login` | Log-in form |
| Set Preferences | `/registerPrefrences` | Personality quiz after signup |
| Browse Animals | `/animal` | Main swiping interface (card stack) |
| My Matches | `/animals` | Grid of all liked animals |

### Frontend Files
- `style.css` - All styling (warm colors: beige, orange, brown)
- `animals-swipe.js` - JavaScript for swipe/drag functionality
- Blade templates - HTML structure with PHP variables

### Key UI Components

**🎨 CARD SWIPE VIEW (/animal)**
```
├─ Stack of animal cards
├─ Swipe right to like
├─ Swipe left to skip
└─ Card animation when swiping
```

**🎨 MATCHES GRID (/animals)**
```
├─ Grid layout of all liked animals
├─ Animal image + info on each card
├─ Shelter contact details
└─ Delete button to remove from likes
```

---

## 7️⃣ How Data Flows Through The System

```
USER JOURNEY:

1. User arrives at home page (/)
   ↓
2. User clicks "Register" → /register form
   ↓
3. User enters name, email, password → POST /register
   ↓
   RegisterController::store() → Creates User → Logs them in
   ↓
4. Redirects to "/registerPrefrences" 
   ↓
5. User fills personality preferences → POST /registerPrefrences
   ↓
   RegisterController::storePreferences() → Updates User with preferences
   ↓
6. Redirects to home "/"
   ↓
7. User clicks "Browse" → /animal
   ↓
   AnimalsController::index()
   ├─ Gets user via Auth::user()
   ├─ Finds all their liked animals (from animal_match table)
   ├─ Gets all animals NOT in that list
   ├─ Calculates match score for each animal
   ├─ Sorts by score (highest first)
   └─ Returns view with sorted animals array
   
8. User sees card stack and starts swiping
   ↓
9. JavaScript (AnimalSwiper class) detects swipe
   ↓
10. If RIGHT swipe → sends POST /animals/like with animal_id
    ↓
    AnimalsController::like() → Validates → Creates AnimalMatch record
    
11. If LEFT swipe → Just removes card (no record created)
    ↓
12. User can view all likes by going to /animals
    ↓
    AnimalsMatchsController::index()
    ├─ Gets all AnimalMatch records for user
    ├─ Loads related Animal and Shelter data
    └─ Shows grid of matches

13. User can click delete on any match
    ↓
    DELETE /animals/{id} → AnimalsMatchsController::destroy()
    ├─ Verifies user owns this match
    ├─ Deletes AnimalMatch record
    └─ Redirects back to /animals
```

---

## 8️⃣ Important Code Examples (Simple & Short)

### Example 1: The Matching Algorithm

```php
// From AnimalsController::index()
$animals = Animal::whereNotIn('id', $matchedIds)
    ->get()
    ->sortByDesc(function ($animal) use ($user) {
        $matches = 0;
        
        // Higher weight for animal type
        if ($user->animal_type === $animal->animal_type) {
            $matches += 5;
        }
        
        // Lower weight for personality traits
        if ($user->activity_level === $animal->activity_level) {
            $matches++;  // Each trait = 1 point
        }
        // ... same for social_level, sleep_type, etc ...
        
        return $matches;
    })->values();
```

### Example 2: Saving a Like

```php
// From AnimalsController::like()
public function like(Request $request, AnimalLikeService $validator) {
    $validated = $validator->validateLikeStore($request->all());
    
    AnimalMatch::create([
        'user_id' => Auth::id(),  // Current logged-in user
        'animal_id' => $validated['animal_id']  // The animal they like
    ]);
}
```

### Example 3: Frontend Swipe Detection

```javascript
// From animals-swipe.js
swipe(dir) {
    const card = this.getCurrentCard();
    
    if (dir === 'right') {
        const id = card.dataset.animalId;
        this.like(id);  // Send to backend
    }
    
    card.classList.add(`swipe-${dir}`);
    // ... animation happens ...
}

like(animalId) {
    fetch('/animals/like', {
        method: 'POST',
        body: JSON.stringify({ animal_id: animalId })
    });
}
```

### Example 4: Blade Template Loop

```blade
@foreach($animalMatches as $match)
    <div class="match-card">
        <img src="{{ asset('storage/' . $match->animal->image_id) }}">
        <h3>{{ $match->animal->name }}</h3>
        <!-- Show animal info... -->
    </div>
@endforeach
```

---

## 9️⃣ Problems & Weaknesses in the Code

| Issue | Location | Problem | Severity |
|-------|----------|---------|----------|
| ⚠️ **No Foreign Keys** | Migrations | Uses `integer` for IDs instead of actual database foreign keys - could cause orphaned records | Medium |
| ⚠️ **Typo in Route** | routes/web.php | Called `/registerPrefrences` instead of `/registerPreferences` | Low |
| ⚠️ **Typo in Controller Name** | Routes | `AnimalsMatchsController` should be `AnimalMatchesController` | Low |
| ⚠️ **No Error Response** | AnimalsController::like() | The `like()` method doesn't return a response - browser gets nothing | High |
| ⚠️ **Bad Logic** | animal index.blade.php | Uses `$animal->activity_level` to check sleep_type display logic (copy-paste error in conditionals) | Medium |
| ⚠️ **No Validation** | AnimalsMatchsController | Could like same animal twice - no uniqueness constraint | High |
| ⚠️ **Raw Image IDs** | Models | Stores image_id as string instead of File model | Low |
| ⚠️ **No Pagination** | AnimalsController::index() | Loads ALL animals at once - will be slow with many pets | High |
| ⚠️ **Missing CSRF** | Some views might have issues | CSRF-token needs to always be present in forms | Medium |
| ⚠️ **No Rate Limiting** | like() action | User could spam the like button 1000 times per second | Medium |

### Quick Fixes Recommended

1. **Add database foreign keys** to migrations
```php
$table->foreignId('shelter_id')->constrained('shelters');
$table->foreignId('user_id')->constrained('users');
$table->foreignId('animal_id')->constrained('animals');
```

2. **Fix the typos** in naming:
   - `/registerPrefrences` → `/registerPreferences`
   - `AnimalsMatchsController` → `AnimalMatchesController`

3. **Return a response** from `like()` method:
```php
return response()->json(['success' => true]);
```

4. **Add unique constraint** to `animal_match` table:
```php
$table->unique(['user_id', 'animal_id']);
```

5. **Add pagination** to prevent loading all animals:
```php
$animals = Animal::paginate(20);
```

6. **Add rate limiting** to like route:
```php
Route::post('/animals/like', ...)->middleware('throttle:60,1');
```

---

## Summary in One Sentence

**A mobile-friendly pet adoption app where users create a personality profile, swipe through shelter animals, and save matches - using a smart algorithm to show them the best-fit pets first.**

---

## Project Statistics

- **Controllers**: 4 (AnimalsController, AnimalsMatchsController, RegisterController, SessionController)
- **Models**: 4 (Animal, User, AnimalMatch, Shelter)
- **Database Tables**: 4 core tables + Laravel system tables
- **Views**: 6 main pages
- **Routes**: 10 endpoints
- **JavaScript Files**: 1 main file (animals-swipe.js)
- **Total Features**: 6 main user features

---

**Created**: March 26, 2026

