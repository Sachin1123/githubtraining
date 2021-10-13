<?php 
abstract class test{
public function make(){
    return $this->mobile()->computer()->user();
}
protected function mobile(){
    echo(' redmii');
    return $this;
}
protected function computer(){
    echo (' acer');
    return $this;
}
protected abstract function user();
}
class student extends test{
    public function user(){
        echo('sachin');
        return $this;
    }
}
class students extends test{
    public function user(){
        echo(' rohan thakur');
        return $this;
    }
}
$user=new students();
$user->make();
