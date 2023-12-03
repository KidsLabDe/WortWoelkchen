#


# actions

seite neu laden!

`<button wire:click="$refresh">Refresh page!</button>`

## function in klasse aufrufen:

`<button wire:click="increment">+</button>`

ruft die klasse increment auf!

## confirm

wire.confirm="Sicher löschen?"

# Properties

Linke public properties zu feldern und inhalten im blade!

`    <input type="text" wire:model="todo">
`

### .live

.debounce ? Def. 250ms
.throttle 
.change - wenn man aus dem feld raus geht. 
.blur - wenn der fokus weg ist


# lifecycle hooks
## mount function!

- beim ersten laden aufgerufen
- damit kann man sachen übergeben.

## updated
- jedesmal, wenn was vom browser kommt.
- kann man anfragen filtern.
    $property / $value

### updatedPropertyName



# Forms

## Validation

$this->validation(
    [
        'feld' => 'required'
    ]
)


@error('title) {{ $message}} @enderror


# ablauf ww

1. mount lädt die frage aus der Datenbank und speichert sie


Todo:
- enable propertie im Model

