<?php

/**
 * Class InMemoryReceiptsInterfaceRepository.
 *
 * @author        Shivanshu Patel <shivanshu.patel@worldfirst.com>
 * @copyright     2016 World First Ltd. All rights reserved.
 */
class InMemoryReceiptsRepositoryInterfaceRepository implements ReceiptsRepositoryInterface
{

    /**
     * @var Receipt[]
     */
    private $data = [];

    /**
     * @param RollNumber $rollNumber
     * @return Receipt
     *
     * @throws Exception
     */
    public function findByRollNumber(RollNumber $rollNumber) : Receipt
    {
        if (empty($this->data)) {
            throw new Exception('no receipt exists');
        }

        foreach ($this->data as $data)
        {
            if ($data->hasRollNumber($rollNumber)) {
                return $data;
            }
        }
    }

    public function save(Receipt $receipt)
    {
        $this->data[] = $receipt;
    }
}