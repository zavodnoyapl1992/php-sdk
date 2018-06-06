<?php


namespace KassaCom\SDK\Model\Request\Reports;


use KassaCom\SDK\Model\Request\AbstractRequest;
use KassaCom\SDK\Model\Traits\RecursiveRestoreTrait;
use KassaCom\SDK\Model\Types\PayoutsStatusType;

class PayoutsReportRequest extends AbstractRequest
{
    use RecursiveRestoreTrait;

    /**
     * Начала периода, в формате datetime
     *
     * @var \DateTime
     */
    private $datetimeFrom;

    /**
     * Завершение периода, в формате datetime
     *
     * @var \DateTime
     */
    private $datetimeTo;

    /**
     * Идентификатор кошелька. Если не указан, будет возвращено по всем
     *
     * @var integer|null
     */
    private $walletId;

    /**
     * Идентификатор статуса выплат.
     *
     * @var string|null
     */
    private $status;

    /**
     * @return \DateTime
     */
    public function getDatetimeFrom()
    {
        return $this->datetimeFrom;
    }

    /**
     * @param \DateTime $datetimeFrom
     *
     * @return $this
     */
    public function setDatetimeFrom($datetimeFrom)
    {
        $this->datetimeFrom = $datetimeFrom;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDatetimeTo()
    {
        return $this->datetimeTo;
    }

    /**
     * @param \DateTime $datetimeTo
     *
     * @return $this
     */
    public function setDatetimeTo($datetimeTo)
    {
        $this->datetimeTo = $datetimeTo;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getWalletId()
    {
        return $this->walletId;
    }

    /**
     * @param int|null $walletId
     *
     * @return $this
     */
    public function setWalletId($walletId)
    {
        $this->walletId = $walletId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param null|string $status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRequiredFields()
    {
        return [
            'datetime_from' => AbstractRequest::TYPE_DATE,
            'datetime_to' => AbstractRequest::TYPE_DATE,
        ];
    }

    /**
     * @inheritDoc
     */
    public function getOptionalFields()
    {
        return [
            'wallet_id' => AbstractRequest::TYPE_INTEGER,
            'status' => new PayoutsStatusType($this),
        ];
    }
}
