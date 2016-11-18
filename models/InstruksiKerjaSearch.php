<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InstruksiKerja;

/**
 * app\models\InstruksiKerjaSearch represents the model behind the search form about `app\models\InstruksiKerja`.
 */
 class InstruksiKerjaSearch extends InstruksiKerja
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_client'], 'integer'],
            [['case_number', 'type_of_instruction', 'date_of_instruction', 'assurers', 'insured', 'broker', 'conveyence', 'interest', 'date_of_loss', 'casualty', 'amount_of_loss', 'amount_of_loss_usd', 'sum_insured', 'sum_insured_usd', 'fee_code', 'fee_code_usd', 'not_relevant', 'protected', 'time_bar_due', 'comment', 'date_entered', 'adjuster', 'actual_fee', 'actual_fee_usd', 'expenses', 'expenses_usd', 'status', 'date_send_of_pa', 'date_send_of_dfr', 'date_send_of_doc_request', 'date_of_issued', 'date_of_last_correspondent', 'remark', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = InstruksiKerja::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            //$query->where("status = 'outstanding'");
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_client' => $this->id_client,
            'date_of_instruction' => $this->date_of_instruction,
            'date_of_loss' => $this->date_of_loss,
            'time_bar_due' => $this->time_bar_due,
            'date_entered' => $this->date_entered,
            'date_send_of_pa' => $this->date_send_of_pa,
            'date_send_of_dfr' => $this->date_send_of_dfr,
            'date_send_of_doc_request' => $this->date_send_of_doc_request,
            'date_of_issued' => $this->date_of_issued,
            'date_of_last_correspondent' => $this->date_of_last_correspondent,
        ]);

        $query->andFilterWhere(['like', 'case_number', $this->case_number])
            ->andFilterWhere(['like', 'type_of_instruction', $this->type_of_instruction])
            ->andFilterWhere(['like', 'assurers', $this->assurers])
            ->andFilterWhere(['like', 'insured', $this->insured])
            ->andFilterWhere(['like', 'broker', $this->broker])
            ->andFilterWhere(['like', 'conveyence', $this->conveyence])
            ->andFilterWhere(['like', 'interest', $this->interest])
            ->andFilterWhere(['like', 'casualty', $this->casualty])
            ->andFilterWhere(['like', 'amount_of_loss', $this->amount_of_loss])
            ->andFilterWhere(['like', 'sum_insured', $this->sum_insured])
            ->andFilterWhere(['like', 'fee_code', $this->fee_code])
            ->andFilterWhere(['like', 'fee_code_usd', $this->fee_code_usd])
            ->andFilterWhere(['like', 'not_relevant', $this->not_relevant])
            ->andFilterWhere(['like', 'protected', $this->protected])
            ->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'adjuster', $this->adjuster])
            ->andFilterWhere(['like', 'actual_fee', $this->actual_fee])
            ->andFilterWhere(['like', 'expenses', $this->expenses])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
