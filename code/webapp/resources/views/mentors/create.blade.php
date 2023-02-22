<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Waaiburg - Begeleiders</title>
</head>

<body class="flex">
  <x-navbar />
  <main class="w-full bg-[#ecf0f5]">
    <x-topbar />
    <x-welcome />

    <div class="m-5 bg-white rounded border">
      <div class="border-t-4 rounded border-[#3c8dbc]">
        <div class="m-3">
            <h1 class="text-2xl">Begeleider toevoegen</h1>
            <form action="{{ route('mentors.store') }}" method="POST" class="flex flex-col mt-3">
                @csrf
                @method('POST')
    
                <label for="firstname" class="font-bold">Voornaam*</label>
                <input type="text" name="firstname" id="firstname" placeholder="Enter voornaam" required class="border border-[#d2d6de] px-4 py-2 outline-[#3c8dbc] mb-3">
                
                <label for="surname" class="font-bold">Achternaam*</label>
                <input type="text" name="surname" id="surname" placeholder="Enter achternaam" required class="border border-[#d2d6de] px-4 py-2 outline-[#3c8dbc] mb-3">
    
    
                <label for="email" class="font-bold">Email*</label>
                <input type="text" name="email" id="email" placeholder="Enter email" required class="border border-[#d2d6de] px-4 py-2 outline-[#3c8dbc] mb-3">
    
                <label for="role" class="font-bold">Functie*</label>
                <select name="role" id="role" class="border border-[#d2d6de] px-4 py-2 outline-[#3c8dbc] mb-3">
                  @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                  @endforeach
                </select>

                <div class="flex items-center gap-3 mt-3 mb-3">
                  <label for="department" class="font-bold">Afdeling</label>
                  <iconify-icon icon="fa6-solid:plus" class="text-[#3c8dbc] text-xl cursor-pointer" />
                </div>
    
                <div class="flex items-center mb-3">
                  <select name="department" id="department" class="border border-[#d2d6de] px-4 py-2 outline-[#3c8dbc]">
                    @foreach ($departments as $department)
                      <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                  </select>
                  <a href="#" class="text-[#3c8dbc] ml-2">Verwijder</a>
                </div>
    
                <x-contactgegevens />
                 <x-form-button text="Aanmaken" />
              </form>
        </div>
      </div>
    </div>
  </main>
</body>

</html>