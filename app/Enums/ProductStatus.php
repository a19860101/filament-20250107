<?php
    namespace App\Enums;

    use Filament\Support\Contracts\HasLabel;
    use Filament\Support\Contracts\HasColor;

    use Filament\Support\Colors\Color;



    enum ProductStatus: string implements HasLabel,HasColor {
        case Disabled = 'disabled';
        case Hot = 'hot';
        case Sale = 'on sale';
        case SoldOut = 'sold out';

        public function getLabel(): ?string {
            // return $this->name;

            return match ($this) {
                self::Disabled => '下架',
                self::Hot => '熱賣中',
                self::Sale => '特價中',
                self::SoldOut => '售完',
            };
        }
        public function getColor(): string | array | null {

            // return match ($this) {
            //     self::Disabled => 'gray',
            //     self::Hot => 'danger',
            //     self::Sale => 'warning',
            //     self::SoldOut => 'gray',
            // };
            return match ($this) {
                self::Disabled => Color::Zinc,
                self::Hot => Color::Red,
                self::Sale => Color::Amber,
                self::SoldOut => Color::Purple,
            };
        }
    }
