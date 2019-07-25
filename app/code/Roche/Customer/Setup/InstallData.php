<?php
namespace Roche\Customer\Setup;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Api\AttributeRepositoryInterface;
use Magento\Customer\Model\Customer;


class InstallData implements InstallDataInterface
{
    /**
     * EAV setup factory
     *
     * @var \Magento\Eav\Setup\EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * Customer setup factory
     *
     * @var CustomerSetupFactory
     */
    private $customerSetupFactory;

    /**
     * Attribute repository interface
     *
     * @var AttributeRepositoryInterface
     */
    private $attributeRepository;

    /**
     * Constructor InstallData
     *
     * @param EavSetupFactory              $eavSetupFactory
     * @param CustomerSetupFactory         $customerSetupFactory
     * @param AttributeRepositoryInterface $attributeRepository
     */
    public function __construct(
        EavSetupFactory $eavSetupFactory,
        CustomerSetupFactory $customerSetupFactory,
        AttributeRepositoryInterface $attributeRepository
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->customerSetupFactory = $customerSetupFactory;
        $this->attributeRepository = $attributeRepository;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);

        $customerSetup->addAttribute(
            Customer::ENTITY,
            'customer_company',
            [
                'type'           => 'text',
                'label'          => 'Company name',
                'input'          => 'text',
                'required'       => 0,
                'visible'        => 1,
                'sort_order'     => 50,
                'position'       => 50,
                'source'         => '',
                'validate_rules' => '',
                'system'         => 0,
                'frontend_label' => 'Company name',
                'backend_model'  => ''
            ]
        );

        // show the attribute in the following forms
        $attribute = $customerSetup
            ->getEavConfig()
            ->getAttribute(
                Customer::ENTITY,
                'customer_company'
            )->addData(
                [
                    'used_in_forms' => [
                        'adminhtml_customer',
                        'adminhtml_checkout',
                        'customer_account_create',
                        'customer_account_edit'
                    ]
                ]
            );

        $this->attributeRepository->save($attribute);

        $setup->endSetup();
    }
}
