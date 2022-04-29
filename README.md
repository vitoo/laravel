# A boilerplate

- TALL stack (Tailwind, AlpineJS, Laravel, Livewire)
- Turbolinks   
- User roles
- php cs fixer
- php stan
- spatie laravel health

### git pre commit = php-cs-fixer fix 

.git/hooks/pre-commit

    #!/bin/sh
    
    PHP_CS_FIXER="php-cs-fixer"
    
    git status --porcelain | grep -e '^[AM]\(.*\).php$' | cut -c 3- | while read line; do
    $PHP_CS_FIXER fix --verbose "$line";
    git add "$line";
    done