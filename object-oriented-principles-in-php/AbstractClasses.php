<?php
abstract class AchievementType
{
    public function name()
    {
        $class = (new ReflectionClass($this))->getShortName();
        return trim(preg_replace('/[A-Z]/', ' $0', $class));
    }
    public function icon()
    {
        return strtolower(str_replace(' ', '-', $this->name()) . '.png');
    }
    abstract public function qualifier($user); // non può avere un body in quanto astratto, se lo voglio usare sono obbligato ad implementarlo nel figlio
}
class FirstThousandPoints extends AchievementType {
    public function qualifier($user)
    {

    }
}
class FirstBestAnswer extends AchievementType {
    public function qualifier($user)
    {

    }
}

class ReachTo50 extends AchievementType {
    public function qualifier($user)
    {
        return $user;
    }
}

var_dump([
    'name' => (new ReachTo50())->name(),
    'icon' => (new ReachTo50())->icon(),
    'qualifier' => (new ReachTo50())->qualifier('aaa')
]);