# MAPLE

#### _soamn/maple_

#### Get Beautiful Ui Components for Laravel/Blade

`!! Important - Remember to add Following CDN for alpine.js `

`<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>`

## 📚 Quick Links

- [Install Instructions](#install-instructions)
- [🔘 Button Base](#button-base)
- [🃏 Card - Untouchable](#carduntouchable)
- [🌀 Card - Carousal 3D](#cardcarousal3d)
- [💬 Tooltip](#tooltip)
- [⌨️ Typewriter](#typewriter)
- [📁 Sidebar](#sidebar)

---

#### Install command

`composer require soman/maple`

`php artisan maple:install [component]`

[Package Link](https://packagist.org/packages/soamn/maple)

# Components

### Button Base

` php artisan maple:install button/base`

```
      <x-maple.button.base>
            Button
      </x-maple.button.base>
```

![Button](https://raw.githubusercontent.com/soamn/maple/master/assets/image.png)

---

### Card/untouchable

` php artisan maple:install card/untouchable`

### Props

`maxRotation`
_how much does the card rotate along the axis_

```
      <x-maple.card.untouchable maxRotation=20 >
        <div>
        <p class="text-lg">Untouchable</p>
        <p class="text-sm">Touch me if you can</p>
        </div>
        <img src= '' alt="">
    </x-maple.card.untouchable>

```

![untouchable](https://raw.githubusercontent.com/soamn/maple/master/assets/image-1.png)

---

### Card/carousal3d

` php artisan maple:install card/carousal3d`

### Props

- `:items=[]`
  _array of array with id and image_

- `autoRotate` _default-`false` Rotates the cards after several interval_

```
        <x-maple.card.carousal3d :items="[
        [
            'id' => 1,
            'image' =>
                'https://example.png',
        ],
      .
      .
      .

    ]" />

```

![carousal3d](https://raw.githubusercontent.com/soamn/maple/master/assets/image-2.png)

---

### tooltip

`php artisan maple:install tooltip`

### Props

'tooltipBackground' => 'bg-black',
'tooltipText' => 'text-white',
'tooltipWidth' => '20',

`:items=[]` _array of array with id and image_

`tooltipBackground` _Background Color of tooltip_

`tooltipText` _text color of tooltip_

`tooltipWidth` _width of the tooltip card_

```
  <x-maple.tooltip :items="[
            ['id' => 2, 'name' => 'Jane', 'designation' => 'Designer', 'image' => 'https://example']
            .
            .
            .

           ]"
            tooltioWidth='fit' />

```

![tooltip](https://raw.githubusercontent.com/soamn/maple/master/assets/image-3.png)

### typewriter

`php artisan maple:install typewriter`

### Props

`text` _string_

```
 <x-maple.typewriter class="w-100"
            text="I lost control I wanted to kill him what that makes me " />

```

![typewriter](https://raw.githubusercontent.com/soamn/maple/master/assets/image-4.png)

### sidebar

`php artisan maple:install typewriter`

### Props

`color` _bg-white_

`text` _text-black_

`boder` _border-zinc-800_

### Named Slots

`header`

`SidebarItems`

```
    <x-maple.sidebar color='bg-black' text="text-white" border="border-zinc-900">
        <x-slot name='header'>
            <span class="font-bold text-xl">Sidebar</span>
        </x-slot>

        <x-slot name="SidebarItems">
            <a href="#" class="block  px-3 py-2 rounded">Dashboard</a>
            <a href="#" class="block  px-3 py-2 rounded">Projects</a>
            <a href="#" class="block  px-3 py-2 rounded">Settings</a>
        </x-slot>


        <div class="p-6">
            <h1 class="text-3xl font-bold mb-4">Main Content</h1>
            <p>This content smoothly shifts when the sidebar opens or closes. Alpine.js manages the state.</p>
        </div>

    </x-maple.sidebar>
```

![sidebar](https://raw.githubusercontent.com/soamn/maple/master/assets/image-5.png)
