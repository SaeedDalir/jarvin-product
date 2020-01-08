<?php namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Contracts\Validation\Validator;
use Urameshibr\Requests\FormRequest;

abstract class BaseFormRequestAbstract extends FormRequest
{
    /**
     * The validator instance.
     *
     * @var Validator
     */
    protected $validator;

    protected function getValidatorInstance()
    {
        if ($this->validator) {
            return $this->validator;
        }
        $factory = $this->container->make(ValidationFactory::class);
        if (method_exists($this, 'validator')) {
            $validator = $this->container->call([$this, 'validator'], compact('factory'));
        } else{
            $validator = $factory->make(
                $this->validationData(),
                $this->container->call([$this, 'rules']),
                $this->messages(),
                $this->attributes()
            );
        }
        $this->setValidator($validator);
        return $this->validator;
    }

    protected function setValidator(Validator $validator)
    {
        $this->validator = $validator;

        return $this;
    }

    public function validated()
    {
        return $this->validator->validated();
    }
}
