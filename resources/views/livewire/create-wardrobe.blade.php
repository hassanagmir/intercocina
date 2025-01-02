<div class="mt-4">
    
    <div class="mx-auto container px-4 bg-white border shadow-sm rounded-xl pb-4">
        <h2 class="text-xl font-semibold text-gray-800 my-4">Type de Porte</h2>
        <div class="grid md:grid-cols-2 gap-6">
            <label class="group relative border-2 border-gray-200 rounded-xl p-6 cursor-pointer hover:shadow-md transition-all duration-300">
                <input type="radio" name="doorType" value="normal" class="peer hidden">
                <div class="text-center">
                    <div class="w-24 h-24 mx-auto mb-3 bg-gray-100 rounded-lg"></div>
                    <h3 class="text-lg font-medium text-gray-700 group-hover:text-gray-900">Porte Normale</h3>
                </div>
                <div class="absolute inset-0 border-2 border-transparent peer-checked:border-blue-500 peer-checked:bg-blue-50/50 rounded-xl transition-all duration-300"></div>
            </label>
            <label class="group relative border-2 border-gray-200 rounded-xl p-6 cursor-pointer hover:shadow-md transition-all duration-300">
                <input type="radio" name="doorType" value="sliding" class="peer hidden">
                <div class="text-center">
                    <div class="w-24 h-24 mx-auto mb-3 bg-gray-100 rounded-lg"></div>
                    <h3 class="text-lg font-medium text-gray-700 group-hover:text-gray-900">Porte Coulissante</h3>
                </div>
                <div class="absolute inset-0 border-2 border-transparent peer-checked:border-blue-500 peer-checked:bg-blue-50/50 rounded-xl transition-all duration-300"></div>
            </label>
        </div>
    </div>


    <div class="mx-auto container px-4 sm:px-6 lg:px-8 bg-white border shadow-sm rounded-xl mt-4 py-4">
        <div class="grid grid-cols-2 gap-2">
            <div class="grid grid-cols-2 gap-2">
                <div class="w-full max-w-sm">
                    <label for="Hauteur">Hauteur</label>
                    <input placeholder="Hauteur" class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"  />
                </div>
        
                <div class="w-full max-w-sm">
                    <label for="Largeur">Largeur</label>
                    <input placeholder="Largeur" class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"  />
                </div>
        
                <div class="w-full max-w-sm">
                    <label for="Profondeur">Profondeur</label>
                    <input placeholder="Profondeur" class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"  />
                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto container px-4 sm:px-6 lg:px-8 bg-white border shadow-sm rounded-xl mt-4 py-4">
        <h2 class="text-xl">Prots</h2>
        <div class="grid grid-cols-2 gap-2">
            <div class="grid grid-cols-2 gap-2">
                <div class="w-full max-w-sm">
                    <label for="Profondeur">Epaisseur de port</label>
                    <select class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" name="" id="">
                        <option value="0">Sélectionner l'épaisseur</option>
                        <option value="1">16</option>
                        <option value="2">18</option>
                        <option value="3">22</option>
                    </select>
                </div>
        
                <div class="w-full max-w-sm">
                    <label for="Profondeur">Couleur de port</label>
                    <input placeholder="Couleur de port" class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"  />
                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto container px-4 sm:px-6 lg:px-8 bg-white border shadow-sm rounded-xl mt-4 py-4">
        <div class="flex items-center gap-2 mb-4">
            <img src="/assets/icons/Arriere.png" class="h-8" alt="">
            <h2 class="text-xl">Arrières</h2>
        </div>
        <div class="grid grid-cols-2 gap-2">
            <div class="grid grid-cols-2 gap-2">
                <div class="w-full max-w-sm">
                    <label for="Profondeur">Epaisseur d'arrières</label>
                    <select class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" name="" id="">
                        <option value="0">Sélectionner l'épaisseur</option>
                        <option value="1">16</option>
                        <option value="2">18</option>
                        <option value="3">22</option>
                    </select>
                </div>
                <div class="w-full max-w-sm">
                    <label for="Profondeur">Couleur d'arrières</label>
                    <input placeholder="Epaisseur de aspects" class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"  />
                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto container px-4 sm:px-6 lg:px-8 bg-white border shadow-sm rounded-xl mt-4 py-4">
        <div class="flex items-center gap-2 mb-4">
            <img src="/icons/panneaux-icon.png" class="h-8" alt="">
            <h2 class="text-xl">Aspects</h2>
        </div>
        <div class="grid grid-cols-2 gap-2">
            <div class="grid grid-cols-2 gap-2">
                <div class="w-full max-w-sm">
                    <label for="Profondeur">Epaisseur d'arrière</label>
                    <select class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" name="" id="">
                        <option value="0">Sélectionner l'épaisseur</option>
                        <option value="1">16</option>
                        <option value="2">18</option>
                        <option value="3">22</option>
                    </select>
                </div>
                <div class="w-full max-w-sm">
                    <label for="Profondeur">Couleur d'arrière</label>
                    <input placeholder="Couleur d'arrière" class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"  />
                </div>
            </div>
        </div>
    </div>


    <div class="mx-auto container px-3 sm:px-4 lg:px-6 bg-white border shadow-sm rounded-xl mt-4 py-3">
        <div class="flex items-center gap-2 mb-4">
            <img src="/icons/tablette-icon.png" class="h-8" alt="">
            <h2 class="text-xl">Tablettes</h2>
        </div>
        
        <div class="grid grid-cols-4 gap-2 mb-4">
            <div class="w-full max-w-sm">
                <label for="Profondeur">Epaisseur des tablettes</label>
                <select class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" name="" id="">
                    <option value="0">Sélectionner l'épaisseur</option>
                    <option value="1">16</option>
                    <option value="2">18</option>
                    <option value="3">22</option>
                </select>
            </div>
           <div>
            <label for="Profondeur">Couleur des tablettes</label>
            <input placeholder="Couleur des tiroir" class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"  />
           </div>
        </div>
    </div>


    <div class="mx-auto container px-3 sm:px-4 lg:px-6 bg-white border shadow-sm rounded-xl mt-4 py-3">
        <div class="flex items-center gap-2 mb-4">
            <img src="/icons/tiroir-icon.png" class="h-8" alt="tiroir">
            <h2 class="text-xl">Tiroir</h2>
        </div>
        <div class="grid grid-cols-2 gap-2">
            <div class="grid grid-cols-2 gap-2">
                <div class="w-full max-w-sm">
                    <label for="Profondeur">Nombre des tiroir</label>
                    <select name="" class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow">
                        <option value="0">Sélectionner le nombre</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                </div>
        
                <div class="w-full max-w-sm">
                    <label for="Profondeur">Type de tiroir</label>
                    <Select class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow">
                        <option value="0">Sélectionner le type</option>
                        <option value="1">A frein</option>
                        <option value="2">Sheet</option>
                    </Select>
                </div>
        
            
                <div class="w-full max-w-sm">
                    <label for="Profondeur">Couleur des tiroir</label>
                    <input placeholder="Couleur des tiroir" class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"  />
                </div>
        
                <div class="w-full max-w-sm">
                    <label for="Profondeur">Epaisseur des tiroir</label>
                    <select class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow" name="" id="">
                        <option value="0">Sélectionner l'épaisseur</option>
                        <option value="1">16</option>
                        <option value="2">18</option>
                        <option value="3">22</option>
                    </select>
                </div>
            </div>
        </div>
   
    </div>


</div>