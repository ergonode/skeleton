<?php
/**
 * Copyright © Bold Brand Commerce Sp. z o.o. All rights reserved.
 * See license.txt for license details.
 */

declare(strict_types=1);

return [
    Doctrine\Bundle\DoctrineBundle\DoctrineBundle::class => ['all' => true],
    Ergonode\Account\ErgonodeAccountBundle::class => ['all' => true],
    Ergonode\Api\ErgonodeApiBundle::class => ['all' => true],
    Ergonode\Attribute\ErgonodeAttributeBundle::class => ['all' => true],
    Ergonode\Authentication\ErgonodeAuthenticationBundle::class => ['all' => true],
    Ergonode\BatchAction\ErgonodeBatchActionBundle::class => ['all' => true],
    Ergonode\Category\ErgonodeCategoryBundle::class => ['all' => true],
    Ergonode\Channel\ErgonodeChannelBundle::class => ['all' => true],
    Ergonode\Comment\ErgonodeCommentBundle::class => ['all' => true],
    Ergonode\Completeness\ErgonodeCompletenessBundle::class => ['all' => true],
    Ergonode\Condition\ErgonodeConditionBundle::class => ['all' => true],
    Ergonode\Core\ErgonodeCoreBundle::class => ['all' => true],
    Ergonode\Designer\ErgonodeDesignerBundle::class => ['all' => true],
    Ergonode\EventSourcing\ErgonodeEventSourcingBundle::class => ['all' => true],
    Ergonode\ExporterFile\ErgonodeExporterFileBundle::class => ['all' => true],
    Ergonode\Fixture\ErgonodeFixtureBundle::class => ['dev' => true, 'test' => true],
    Ergonode\Grid\ErgonodeGridBundle::class => ['all' => true],
    Ergonode\ImporterErgonode1\ErgonodeImporterErgonode1Bundle::class => ['all' => true],
    Ergonode\Importer\ErgonodeImporterBundle::class => ['all' => true],
    Ergonode\Mailer\ErgonodeMailerBundle::class => ['all' => true],
    Ergonode\Migration\ErgonodeMigrationBundle::class => ['all' => true],
    Ergonode\Multimedia\ErgonodeMultimediaBundle::class => ['all' => true],
    Ergonode\Notification\ErgonodeNotificationBundle::class => ['all' => true],
    Ergonode\ProductCollection\ErgonodeProductCollectionBundle::class => ['all' => true],
    Ergonode\Product\ErgonodeProductBundle::class => ['all' => true],
    Ergonode\Reader\ErgonodeReaderBundle::class => ['all' => true],
    Ergonode\Segment\ErgonodeSegmentBundle::class => ['all' => true],
    Ergonode\SharedKernel\ErgonodeSharedKernelBundle::class => ['all' => true],
    Ergonode\Value\ErgonodeValueBundle::class => ['all' => true],
    Ergonode\Workflow\ErgonodeWorkflowBundle::class => ['all' => true],
    Gesdinet\JWTRefreshTokenBundle\GesdinetJWTRefreshTokenBundle::class => ['all' => true],
    JMS\SerializerBundle\JMSSerializerBundle::class => ['all' => true],
    League\FlysystemBundle\FlysystemBundle::class => ['all' => true],
    Lexik\Bundle\JWTAuthenticationBundle\LexikJWTAuthenticationBundle::class => ['all' => true],
    Limenius\LiformBundle\LimeniusLiformBundle::class => ['all' => true],
    Nelmio\Alice\Bridge\Symfony\NelmioAliceBundle::class => ['dev' => true, 'test' => true],
    Nelmio\ApiDocBundle\NelmioApiDocBundle::class => ['all' => true],
    Nelmio\CorsBundle\NelmioCorsBundle::class => ['all' => true],
    Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle::class => ['all' => true],
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['all' => true],
    Symfony\Bundle\MonologBundle\MonologBundle::class => ['all' => true],
    Symfony\Bundle\SecurityBundle\SecurityBundle::class => ['all' => true],
    Symfony\Bundle\TwigBundle\TwigBundle::class => ['all' => true],
    Vich\UploaderBundle\VichUploaderBundle::class => ['all' => true],
];
