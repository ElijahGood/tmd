<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

use app\models\AddForm;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    /**
     * Displays add page.
     *
     * @return string
     */
    public function actionAdd()
    {
        $model = new AddForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $req = Yii::$app->request->post();
            $userData = $model->formUserData($req);
            $model->addMessage($userData);
            return $this->render('add', [
                'model' => $model,
                'alertMsg' => 'Your message was send.',
            ]);
        } else {
            return $this->render('add', [
                'model' => $model,
            ]);
        }

    }

}
